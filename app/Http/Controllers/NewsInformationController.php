<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsInformation;
use Illuminate\Support\Str;

class NewsInformationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Criar um slug único para a notícia
        $slug = Str::slug($validated['name']) . '-' . time();

        // Processar a imagem, se fornecida
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();            
            $request->image->move(public_path('images/newsinformation'), $imageName);
            
        }            

        // Criar o registro
        $news = NewsInformation::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $imageName,
            'status' => $validated['status'],
            'slug' => $slug, // Adicionando slug para melhor navegação
        ]);        

        return redirect()->back()->with('success', 'Notícia criada com sucesso!');
    }

    public function index()
    {
        $newsInformation = NewsInformation::orderBy('created_at', 'desc')->get();
        return view('newsinformation', compact('newsInformation'));
    }

    public function show($slug)
    {
        $news = NewsInformation::where('slug', $slug)->firstOrFail();
        return view('newsinformation.show', compact('news'));
    }
}
