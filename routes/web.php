<?php

declare(strict_types=1);

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
    return view('home');
})->name('/');

Route::get('posts', [App\Http\Controllers\PostController::class, 'index_front'])->name('posts');
Route::get('posts/{slug}', [App\Http\Controllers\PostController::class, 'show_front'])->name('posts.details');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('dashboard/posts', App\Http\Controllers\PostController::class)->names('posts');
    Route::resource('dashboard/categories', App\Http\Controllers\CategoryController::class)->names('categories');
    Route::resource('dashboard/tags', App\Http\Controllers\TagController::class)->names('tags');
    Route::post('dashboard/posts/uploads', [App\Http\Controllers\PostController::class, 'uploads'])->name('posts.uploads');
    Route::post('/dashboard/posts/delete-image', [App\Http\Controllers\PostController::class, 'deleteImage'])->name('posts.delete-image');
    Route::post('/highlight-code', [App\Http\Controllers\PostController::class, 'highlight'])->name('highlight-code');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
