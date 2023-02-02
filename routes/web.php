<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');






    //Define sorters routes with sorter prefix and middleware
    Route::prefix('sorter')->middleware('sorter')->group(function () {
        Route::get('/dashboard', function () {
            return view('sorter.dashboard');
        })->name('sorter.dashboard');
    });



    Route::get('/file/view/{id}', [\App\Http\Controllers\FileController::class, 'view'])->name('file.view');

});


Route::get('/404', function () {
    return view('404');
})->name('404');
