<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
    
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
    #return view('welcome');
    return view('top');
});

Auth::routes();

Route::get('/', [PostController::class, 'top'])->name('top');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/drafts/edit', [PostController::class, 'index'])->name('drafts.edit');
Route::post('/drafts/edit', [PostController::class, 'post'])->name('drafts.post');
Route::get('/drafts/{id}', [PostController::class, 'show'])->name('item');

