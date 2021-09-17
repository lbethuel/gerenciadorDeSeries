<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Models\Temporada;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/criar', [SeriesController::class, 'create']);
Route::post('/series/criar', [SeriesController::class, 'store']);
Route::post('/series/remover/{id}', [SeriesController::class, 'destroy']);

Route::get('/series/{serieId}/temporadas', [TemporadasController::class, 'index']);