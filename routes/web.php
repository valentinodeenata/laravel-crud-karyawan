<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
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
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login/action', [AuthController::class, 'login_aksi']);
Route::get('logout', [AuthController::class, 'logout']);


Route::get('/', [EmployeeController::class, 'index']); 
Route::get('cari', [EmployeeController::class, 'cari']); 
Route::get('filter', [EmployeeController::class, 'filter']); 
Route::middleware('auth')->group(function () {
    Route::get('tambah', [EmployeeController::class, 'tambah']); 
    Route::post('add', [EmployeeController::class, 'tambah_aksi']); 
    Route::get('edit/{id}', [EmployeeController::class, 'edit']); 
    Route::post('update/{id}', [EmployeeController::class, 'edit_aksi']); 
    Route::get('hapus/{id}', [EmployeeController::class, 'delete']); 
    Route::post('ubahStatus/{id}', [EmployeeController::class, 'ubahStatus']);

    Route::get('ganti-password', [AuthController::class, 'changePass']);
    Route::post('ganti-password/action', [AuthController::class, 'changePass_aksi']);
});
