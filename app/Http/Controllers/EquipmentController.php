<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Brand;
use App\Models\Category;
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
        // Validação dos campos do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reference' => 'required|string|max:255|unique:equipments,reference',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brand' => 'required|nullable', // O campo brand é opcional, mas se 'other' for escolhido, precisa ser validado
            'category' => 'required|nullable', // O campo category é obrigatório, mas se 'other' for escolhido, precisa ser validado
        ]);

        // Processar a imagem
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/equipments'), $imageName);
        }

        // Lidar com a marca
        if ($request->brand == 'other' && $request->has('other_brand')) {
            // Validar o nome da nova marca, caso seja "Outro"
            $validatedOtherBrand = $request->validate([
                'other_brand' => 'required|string|max:255',
            ]);
            $brand = Brand::create(['name' => $validatedOtherBrand['other_brand']]);
            $brandId = $brand->id;
        } elseif ($request->brand != 'other') {
            // Usar a marca selecionada
            $brandId = $request->brand;
        } else {
            // Se não houver marca válida ou se for "Outro", definir como null
            $brandId = null;
        }

        // Lidar com a categoria
        if ($request->category == 'other' && $request->has('other_category')) {
            // Validar o nome da nova categoria, caso seja "Outro"
            $validatedOtherCategory = $request->validate([
                'other_category' => 'required|string|max:255',
            ]);
            $category = Category::create(['name' => $validatedOtherCategory['other_category']]);
            $categoryId = $category->id;
        } elseif ($request->category != 'other') {
            // Usar a categoria selecionada
            $categoryId = $request->category;
        } else {
            // Se não houver categoria válida, definir um valor nulo ou uma categoria padrão
            $categoryId = null; // ou um valor padrão, dependendo do seu banco de dados
        }

        // Criar o equipamento com os dados validados e a imagem processada
        Equipment::create([
            'name' => $validated['name'],
            'brand' => $brand['name'],
            'category' => $category, 
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
