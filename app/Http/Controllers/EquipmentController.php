<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Brand;
use App\Models\Category;  // Certifique-se de importar o modelo Category
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    // Listar todos os equipamentos
    public function index()
    {
        $equipments = Equipment::all();
        $brands = Brand::all();
        $categories = Category::all(); // Caso queira listar também as categorias na index
        return view('equipments.index', compact('equipments', 'brands', 'categories'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all(); // Buscando todas as categorias
        return view('equipments.create', compact('brands', 'categories')); // Passando as categorias para a view
    }

    // Armazenar novo equipamento
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|exists:brands,id', // Verificando se a marca existe
            'category' => 'required|exists:categories,id', // Verificando se a categoria existe
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'reference' => 'required|string|max:255|unique:equipments,reference',
            'status' => 'required|in:active,inactive',
        ]);

        // Processar a imagem
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/equipments'), $imageName);
        }

        // Criar equipamento
        Equipment::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand'], // Alterado para 'brand_id' caso tenha essa relação
            'category_id' => $validated['category'], // Usando o ID da categoria
            'description' => $validated['description'] ?? 'Sem descrição',
            'image' => $imageName,
            'reference' => $validated['reference'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('equipments.index')->with('success', 'Equipamento criado com sucesso!');
    }

    // Mostrar detalhes de um equipamento
    public function show($reference)
    {
        $equipment = Equipment::where('reference', $reference)->firstOrFail();
        return view('equipments.show', compact('equipment'));
    }
}
