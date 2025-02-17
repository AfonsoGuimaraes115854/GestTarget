<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsInformation;

class NewsInformationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);
    
        // Processar a imagem, se fornecida
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }
    
        // Criar o registro
        NewsInformation::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'status' => $validated['status'],
        ]);
    
        return redirect()->back()->with('success', 'Notícia criada com sucesso!');
    }
    public function index()
    {
        $newsInformation = NewsInformation::all();
        return view('newsinformation', compact('newsInformation'));
    }

    public function show($id)
    {
        $news = NewsInformation::findOrFail($id);
        return view('newsinformation.show', compact('news'));
    }
    


}    