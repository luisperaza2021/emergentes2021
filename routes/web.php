<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\UserController;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;
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
Route::resource('libros', LibroController::class);
Route::resource('users', UserController::class);
