<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocDocumentoController;
use App\Http\Controllers\ProProcesoController;
use App\Http\Controllers\TipTipoDocController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Account - Auth
Route::post('account/register', [AuthController::class, 'register']);
Route::post('account/authenticate', [AuthController::class, 'authenticate']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('account/logout', [AuthController::class, 'logout']);
});
Route::post('doc_documentos', [DocDocumentoController::class, 'create']);
Route::put('doc_documentos/{id}', [DocDocumentoController::class, 'update']);
Route::delete('doc_documentos/{id}', [DocDocumentoController::class, 'delete']);
Route::get('doc_documentos', [DocDocumentoController::class, 'index']);
Route::get('doc_documentos/{id}', [DocDocumentoController::class, 'show']);

Route::get('tip_tipo_docs', [TipTipoDocController::class, 'index']);

Route::get('pro_procesos', [ProProcesoController::class, 'index']);