<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login/store', [AdminController::class, 'login'])->name('login.store');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/buku', [AdminController::class, 'buku'])->name('buku.index');
    Route::get('/admin/buku/tambah', [AdminController::class, 'create'])->name('buku.tambah');
    Route::post('/admin/buku/store', [AdminController::class, 'store'])->name('buku.store');
    Route::get('/admin/buku/{id}', [AdminController::class, 'show'])->name('buku.show');
    Route::get('/admin/buku/edit/{id}', [AdminController::class, 'edit'])->name('buku.edit');
    Route::put('/admin/buku/update/{id}', [AdminController::class, 'update'])->name('buku.update');
    Route::delete('/admin/buku/delete/{id}', [AdminController::class, 'destroy'])->name('buku.hapus');
});