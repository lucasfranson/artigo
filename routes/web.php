<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesControlles;

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

Route::get('/about', function () {
    return view('about',[
        'articles' => App\Models\Article::latest()->get()
    ]);
});

Route::get('/articles/create', [ArticlesControlles::Class, 'create']);
Route::get('/articles/{articles}', [ArticlesControlles::Class, 'show'])->name('articles.show');
Route::get('/articles/{articles}/edit', [ArticlesControlles::Class, 'edit']);
Route::put('/articles/{articles}', [ArticlesControlles::Class, 'update']);
Route::post('/articles', [ArticlesControlles::Class, 'store']);
Route::get('/articles', [ArticlesControlles::Class, 'index'])->name('articles.index');