<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/acesso', function () {
    return view('acesso');
});
Route::get('/administracao', function () {
    return view('administracao');
});

Route::get('/unidades/{slug}', [UnidadeController::class, 'show'])->name('unidades.show');
