<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Mail\PedidosMail;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Partner;
use App\Models\Information;
use App\Models\NewsInformation;
use App\Models\Image;

use App\Http\Controllers\NewsInformationController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidosController;

// ------------------------------------------
// 👤 AUTENTICAÇÃO PARA TESTES (REMOVER EM PRODUÇÃO)
// ------------------------------------------
//Auth::loginUsingId(1); // Força login com o usuário ID 1

// ------------------------------------------
// 🏠 PÁGINA INICIAL
// ------------------------------------------
Route::get('/', fn() => view('welcome', [
    'partners' => Partner::all(),
    'newsInformation' => NewsInformation::latest()->take(3)->get()
]));

// ------------------------------------------
// 📰 ROTAS DE NOTÍCIAS (NewsInformation)
// ------------------------------------------
Route::prefix('newsinformation')->name('newsinformation.')->group(function () {
    Route::get('/', [NewsInformationController::class, 'index'])->name('index');
    Route::get('/create', fn() => view('newsinformation.create'))->name('create');
    Route::post('/store', [NewsInformationController::class, 'store'])->name('store');
    Route::get('/{slug}', function ($slug) {
        $news = NewsInformation::where('slug', $slug)->firstOrFail();
        return view('newsinformation.show', compact('news'));
    })->name('show');
});

// ------------------------------------------
// ⚙️ ROTAS DE EQUIPAMENTOS
// ------------------------------------------
Route::prefix('equipments')->name('equipments.')->group(function () {
    Route::get('/', function () {
        return view('equipments', [
            'equipments' => Equipment::all(),
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    })->name('index');

    Route::get('/create', [EquipmentController::class, 'create'])->name('create');
    Route::post('/store', [EquipmentController::class, 'store'])->name('store');
    Route::get('/{reference}', [EquipmentController::class, 'show'])->name('show');
});

// ------------------------------------------
// 🖼️ UPLOADS DE IMAGENS
// ------------------------------------------
Route::get('/images', fn() => view('images.index', ['images' => Image::all()]))->name('images.index');
Route::get('/image_upload', fn() => view('image_upload'))->name('image.upload');
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

// ------------------------------------------
// 🗂️ PÁGINAS ESTÁTICAS
// ------------------------------------------
Route::view('/about', 'about');
Route::view('/partners', 'partners', ['partners' => Partner::all()]);
Route::view('/contactos', 'contactos');
Route::view('/serviços', 'servicos');
Route::view('/sobre', 'sobre');
Route::view('/termos-e-condicoes', 'termos-e-condicoes');
Route::view('/politica-de-privacidade', 'politica-de-privacidade');

// ------------------------------------------
// 🛒 ROTAS DO CARRINHO DE COMPRAS
// ------------------------------------------
Route::prefix('carrinho')->name('carrinho.')->group(function () {
    Route::post('/adicionar', [CarrinhoController::class, 'addToCart'])->name('adicionar');
    Route::get('/', [CarrinhoController::class, 'showCart'])->name('exibir');
    Route::get('/remover/{productId}', [CarrinhoController::class, 'removeFromCart'])->name('remover');
    Route::post('/atualizar', [CarrinhoController::class, 'updateQuantity'])->name('atualizar');
});

// ------------------------------------------
// 🔐 ROTA PROTEGIDA (AUTENTICADO)
// ------------------------------------------
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

Route::post('/pedidos/email', [PedidosController::class, 'sendEmail'])->name('send.email');
