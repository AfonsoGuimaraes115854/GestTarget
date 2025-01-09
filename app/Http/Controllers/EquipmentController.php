<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Exibe a lista de equipamentos.
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipments.index', compact('equipments'));
    }

    /**
     * Armazena um novo equipamento no banco de dados.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|exists:brands,id',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reference' => 'required|string|max:255|unique:equipment,ref',
            'status' => 'required|in:active,inactive',
        ]);
        

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('equipments', 'public');
            $validatedData['image'] = $path;
        }

        Equipment::create([
            'name' => $validatedData['name'],
            'brand' => $validatedData['brand'],
            'description' => $validatedData['description'] ?? 'Sem descrição',
            'image' => $validatedData['image'],
            'ref' => $validatedData['reference'],
            'status' => $validatedData['status'],
        ]);
        

        return redirect()->route('equipments.index')->with('success', 'Equipamento registrado com sucesso!');
    }
}
