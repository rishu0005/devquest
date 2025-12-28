<?php

use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if(Auth::check()){
    Route::redirect('/', '/dashboard');
} else {
    Route::redirect('/', '/login');
}

Route::get('/',  [LoginController::class, 'view'])->name('login');
Route::get('/login',  [LoginController::class, 'view'])->name('login');
Route::get('/logout',  [LoginController::class, 'destroy'])->name('logout');
Route::post('/login-store',  [LoginController::class, 'store'])->name('login_post');

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register-store', [RegisterController::class, 'store'])->name('register_post');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/view-quests', [QuestController::class, 'show'])->name('view_quests');
Route::post('/quest-create', [QuestController::class, 'store'])->name('store_quest');
Route::put('/quest-update', [QuestController::class, 'update'])->name('update_quest');
Route::patch('/mark-quest-complete/{id}', [QuestController::class, 'mark'])->name('mark_quest_complete');
Route::delete('/delete-quest', [QuestController::class, 'destroy'])->name('delete_quest');