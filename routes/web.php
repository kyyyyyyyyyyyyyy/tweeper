<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});
Route::get('/coment', function () {
    return view('comment');
});

Route::get('/dashboard', [TweetController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
;
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ... (Bagian lain tidak berubah)

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tweets', TweetController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('users', UserController::class);
    Route::resource('liked', LikeController::class);
});

// ... (Bagian lain tidak berubah)


require __DIR__.'/auth.php';
