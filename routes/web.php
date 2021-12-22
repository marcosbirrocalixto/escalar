<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    PlanController, OrcamentoController, CategoriaController, ProdutoController
};

// Categorias Routes
Route::any('admin/produtos/search', [ProdutoController::class, 'search'])->name('produtos.search');
Route::put('admin/produtos/{id}/update', [ProdutoController::class, 'update'])->name('produtos.update');
Route::get('admin/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::get('admin/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('admin/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::delete('admin/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.delete');
Route::post('admin/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('admin/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
//Fim Categorias Routes

// Categorias Routes
Route::any('admin/categorias/search', [CategoriaController::class, 'search'])->name('categorias.search');
Route::put('admin/categorias/{id}/update', [CategoriaController::class, 'update'])->name('categorias.update');
Route::get('admin/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::get('admin/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('admin/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::delete('admin/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.delete');
Route::post('admin/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('admin/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
//Fim Categorias Routes

//Routes Plans
Route::get('admin/orcamentos', [OrcamentoController::class, 'index'])->name('orcamentos.index');

//Rotas Plans
Route::put('admin/plans/{url}/update', [PlanController::class, 'update'])->name('plans.update');
Route::get('admin/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::get('admin/plans/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::get('admin/plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
Route::any('admin/plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::delete('admin/plans/{url}', [PlanController::class, 'delete'])->name('plans.delete');
Route::post('admin/plans/store', [PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans', [PlanController::class, 'index'])->name('plans.index');
//Fim Rotas Plans

Route::get('/', function () {
    return view('welcome');
});
