<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use App\Models\Libro;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/home');
    }else{
        return redirect('/biblioteca');
    }
});

Route::get('biblioteca', function () {
    $params = [
        'libros' => Libro::paginate(15),
    ];

    return view('welcome', $params);
})->name('biblioteca');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role')->group(function () {
    Route::resource('libros', LibroController::class);
    Route::resource('users', UserController::class);
    Route::post('updatePassword/{id}', [UserController::class, 'updatePassword'])->name('update-password');

    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias');
    Route::get('categorias/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');

    Route::get('autores', [AutorController::class, 'index'])->name('autores');
    Route::get('autores/edit/{autor}', [AutorController::class, 'edit'])->name('autores.edit');
    Route::get('autores/create', [AutorController::class, 'create'])->name('autores.create');

    Route::get('editoriales', [EditorialController::class, 'index'])->name('editoriales');
    Route::get('editoriales/edit/{editorial}', [EditorialController::class, 'edit'])->name('editoriales.edit');
    Route::get('editoriales/create', [EditorialController::class, 'create'])->name('editoriales.create');


    Route::post('itemStore', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'table' => ['required'],
            'nombre' => ['required'],
            'telefono' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::table($request['table'])->insert($request->all());

        return Redirect::back()->with('status', "Registro creado");
    })->name('item.store');

    Route::put('itemUpdate/{id}', function (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'table' => ['required'],
            'nombre' => ['required'],
            'telefono' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::table($request['table'])->where('_id', '=', $id)->update($request->all());

        return Redirect::back()->with('status', "Registro actualizado");
    })->name('item.update');

    Route::delete('itemDestroy/{id}', function (Request $request, $id) {
        DB::table($request['table'])->where('_id', '=', $id)->delete();
        return redirect()->route($request['table']);
    })->name('item.destroy');

});
