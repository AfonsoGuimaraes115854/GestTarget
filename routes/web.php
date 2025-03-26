<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Partner;
use App\Models\Information;
use App\Models\NewsInformation;
use App\Models\Image;
use App\Http\Controllers\NewsInformationController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Login forçando um usuário com ID 1 (pode ser útil para testes)
Auth::loginUsingId(1);

// Rotas para NewsInformation
Route::get('/newsinformation', [NewsInformationController::class, 'index'])->name('newsinformation.index');
Route::get('/newsinformation/create', fn() => view('newsinformation.create'))->name('newsinformation.create');
Route::post('/newsinformation/store', [NewsInformationController::class, 'store'])->name('newsinformation.store');
Route::get('/newsinformation/{slug}', function ($slug) {
    $news = NewsInformation::where('slug', $slug)->firstOrFail();
    return view('newsinformation.show', compact('news'));
})->name('newsinformation.show');

// Outras rotas estáticas
Route::get('/about', fn() => view('about'));
Route::get('/partners', fn() => view('partners', ['partners' => Partner::all()]));
Route::get('/contactos', fn() => view('contactos'));

// Página inicial com as 3 últimas notícias
Route::get('/', fn() => view('welcome', [
    'partners' => Partner::all(),
    'newsInformation' => NewsInformation::latest()->take(3)->get()
]));

// Página de serviços
Route::get('/serviços', fn() => view('servicos'));

// Rota para listar equipamentos (removida a duplicação)
Route::get('/equipments', function () {
    return view('equipments', [
        'equipments' => Equipment::all(),
        'brands' => Brand::all(),
        'categories' => Category::all()
    ]);
})->name('equipments.index');

// Rota para criar equipamentos
Route::get('/equipments/create', [EquipmentController::class, 'create'])->name('equipments.create');

// Rota para armazenar novos equipamentos
Route::post('/equipments/store', [EquipmentController::class, 'store'])->name('equipments.store');

// Rota para mostrar detalhes de um equipamento (usando "reference" como parâmetro)
Route::get('/equipments/{reference}', [EquipmentController::class, 'show'])->name('equipments.show');

// Rota para listar marcas
Route::get('/brands', fn() => view('brands.index', ['brands' => Brand::all()]));

// Outras páginas estáticas
Route::get('/sobre', fn() => view('sobre'));
Route::get('/create-partner', fn() => view('create-partner'));
Route::get('/organizations', fn() => response("Olá, encontraste uma página em construção."));

// Rota protegida por autenticação
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

// Rotas para upload de imagens
Route::get('/images', function () {
    return view('images.index', ['images' => Image::all()]);
})->name('images.index');

// Rota para upload de imagem
Route::get('/image_upload', fn() => view('image_upload'))->name('image.upload');

// Armazenamento de imagem
Route::post('/image_upload/store', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png|max:2048'
    ]);

    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    Image::create([
        'name' => $request['name'],
        'path' => $imageName
    ]);

    return redirect()->route('images.index')->with('success', 'Imagem carregada com sucesso!');
})->name('image.store');
