<?php

use App\Http\Controllers\CotacaoController;
use App\Http\Controllers\TransportadoraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cotacao', [CotacaoController::class, 'index']);
Route::get('/transportadora', [TransportadoraController::class, 'index']);
Route::post('/cotacao', [CotacaoController::class, 'store']);
Route::put('/cotacao', [CotacaoController::class, 'update']);

