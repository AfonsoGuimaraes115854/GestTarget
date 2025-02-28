<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Partner;
use App\Models\Information;
use App\Models\NewsInformation;
use App\Http\Controllers\NewsInformationController;
use Database\Seeders\InformationSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::loginUsingId(1);

Route::get('/newsinformation', [NewsInformationController::class, 'index'])->name('newsinformation.index');

Route::get('/newsinformation/create', function () {
    return view('newsinformation.create');
})->name('newsinformation.create');

Route::post('/newsinformation/store', [NewsInformationController::class, 'store'])->name('newsinformation.store');

Route::get('/newsinformation/{slug}', function ($slug) {
    $news = NewsInformation::where('slug', $slug)->firstOrFail();
    return view('newsinformation.show', compact('news'));
})->name('newsinformation.show');

Route::get('/about', fn() => view('about'));
Route::get('/partners', fn() => view('partners', ['partners' => App\Models\Partner::all()]));
Route::get('/contactos', fn() => view('contactos'));
Route::get('/', fn() => view('welcome', ['partners' => App\Models\Partner::all()]));
Route::get('/serviços', fn() => view('servicos'));

Route::get('/equipments', function () {
    return view('equipments', [
        'equipments' => App\Models\Equipment::all(),
        'brands' => App\Models\Brand::all(),
    ]);
});

Route::get('/equipments/create', function () {
    return view('equipments.create', [
        'equipments' => App\Models\Equipment::all(),
        'brands' => App\Models\Brand::all(),
    ]);
})->name('equipments.create');

Route::get('/equipments/{reference}', function ($reference) {
    $equipment = App\Models\Equipment::where('reference', $reference)->firstOrFail();
    return view('equipments.show', compact('equipment'));
})->name('equipments.show');

Route::post('/equipments/store', function (Request $request) {
    App\Models\Equipment::create($request->only(['name', 'reference', 'description', 'image', 'brand']));
    return redirect()->route('equipments.create')->with('success', 'Equipamento criado com sucesso!');
})->name('equipments.store');

Route::get('/brands', fn() => view('brands.index', ['brands' => App\Models\Brand::all()]));

Route::get('/sobre', fn() => view('sobre'));
Route::get('/create-partner', fn() => view('create-partner'));
Route::get('/organizations', fn() => response("Olá, encontraste uma página em construção."));

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});
