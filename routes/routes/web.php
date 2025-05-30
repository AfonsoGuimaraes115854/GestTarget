<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Partner;
use App\Models\Information;
use App\Http\Controllers\NewsInformationController;
use Database\Seeders\InformationSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(1);

Route::get('/newsinformation', function () {
    $Informations = Information::all();
    return view('newsinformation', compact('Informations'));
});

Route::get('/newsinformation/create', function () {
    return view('newsinformation.create');
})->name('newsinformation.create');

Route::post('/newsinformation/store', [NewsInformationController::class, 'store'])->name('newsinformation.store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/partners', function () {
    $partners = Partner::all();
    return view('partners', compact('partners'));
});

Route::get('/contactos', function () {
    return view('contactos');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/serviços', function () {
    return view('servicos');
});

Route::get('/equipments', function () {
    $equipments = Equipment::all();
    $brands = Brand::all();
    return view('equipments', compact('equipments', 'brands'));
});

Route::get('/equipments/create', function () {
    $equipments = Equipment::all();
    $brands = Brand::all();
    return view('equipments.create', compact('equipments', 'brands'));
})->name('equipments.create');

Route::get('/equipments/{id}', function ($id) {
    $equipment = Equipment::find($id);
    return view('equipments.show', compact('equipment'));
});

Route::get('/brands', function () {
    $brands = Brand::all();
    return view('brands.index', compact('brands'));
});

Route::get('/sobre', function () {
    return view('sobre');
});



Route::post('/equipments/store', function (Request $request) {
    Equipment::create([
        'name' => $request->input('name'),
        'ref' => $request->input('ref'),
        'description' => $request->input('description'),
        'image' => $request->input('image'),
        'brand' => $request->input('brand'),
    ]);
})->name('equipments.store');

Route::get('/create-partner', function () {
    return view('create-partner');
});

Route::get('/organizations', function () {
    echo "Olá, encontraste uma página em construção.";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});