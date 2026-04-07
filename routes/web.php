<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetricaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController; 

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

Route::get('/crm-contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route untuk menyimpan kontak baru
Route::post('/crm-contacts/store', [ContactController::class, 'store'])->name('contacts.store');

// Route untuk menghapus kontak
Route::delete('/crm-contacts/delete/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
// Route untuk menampilkan halaman form tambah kontak
Route::get('/crm-contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route untuk menampilkan halaman form edit kontak
Route::get('/crm-contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
// Route untuk memproses pembaruan (update) data kontak
Route::put('/crm-contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
Route::get('{any}',[MetricaController::class,'index']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
