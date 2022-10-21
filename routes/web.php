<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::get('/allusers', [UserController::class, 'all']);
Route::get('/pdf', [UserController::class, 'pdf']);
Route::get('/excel', [UserController::class, 'export']);



Route::post('/import', [UserController::class, 'import']);











Route::get('/test', function () {
    Storage::disk('public')->put('test.txt', 'helloooo mouaz alkhateeb');
    return 'done';
});
Route::get('/file', [UploadController::class, 'show'])->name('file');
Route::post('/store', [UploadController::class, 'store'])->name('photo.save');

Route::get('/view/img', [UploadController::class, 'view']);




// Route::get('send', function () {
//     Mail::to('moaz.alkhateeb99@gmail.com')->send(new \App\Mail\TestMail($urer));
//     dd("Email is Sent.");
// });
Route::resource('/posts', PostController::class);

Route::get('/notificationRead', [PostController::class, 'MarkAll'])->name('notificationRead');
Route::get('/all', [PostController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users_email', [UserController::class, 'email']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
