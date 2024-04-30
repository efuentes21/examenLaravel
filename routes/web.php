<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CasalController;

Route::get('/', [CasalController::class, 'index'])->name('home');

Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/register', [UserController::class, 'register'])->name('register.commit');
Route::get('/login', [UserController::class, 'showLogin'])->name('login.show');
Route::post('/login', [UserController::class, 'login'])->name('login.commit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/casal/new', [CasalController::class, 'new'])->name("casal.new");
Route::post('/casal/create', [CasalController::class, 'create'])->name("casal.create");
Route::get('/casal/edit/{casal}', [CasalController::class, 'edit'])->name("casal.edit");
Route::post('/casal/update/{casal}', [CasalController::class, 'update'])->name("casal.update");
Route::delete('/casal/destroy/{casal}', [CasalController::class, 'destroy'])->name("casal.destroy");