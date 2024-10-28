<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('投稿一覧');
});

<<<<<<< HEAD
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
=======
// これらの個別のルートは不要です
// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
// Route::get('/posts/create', [PostController::class, 'create']);

Route::resource('posts', PostController::class);
>>>>>>> c8562981540a02e07c602d6dcaa2ee738b2106fd
