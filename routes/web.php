<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;

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
    return view('welcome');
});
Route::controller(AlumnosController::class)->group(function(){
    Route::get('alumnos', 'index');
    Route::get('alumnos-export', 'export')->name('alumnos.export');
    Route::post('alumnos-import', 'import')->name('alumnos.import');
});
