<?php

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Editorial;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('libros', function () {
    return response()->json(Libro::all(), 200);
});
Route::get('autores', function () {
    return response()->json(Autor::all(), 200);
});
Route::get('categorias', function () {
    return response()->json(Categoria::all(), 200);
});
Route::get('editoriales', function () {
    return response()->json(Editorial::all(), 200);
});
