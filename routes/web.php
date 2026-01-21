<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

//For Livewire
Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration',function(){
    return view('welcome');
});

Route::get('li-list',function(){
    return view('livewire_users_list');
})->name('users.list');
//End livewire

Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/user/create', [UserController::class,'create'])->name('users.create');
Route::post('/user/store', [UserController::class,'store'])->name('users.store');

// for edit
Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('users.edit');
Route::post('/user/update/{id}', [UserController::class,'update'])->name('users.update');
Route::delete('/user/delete/{id}', [UserController::class,'destroy'])->name('users.destroy');

Route::middleware(['auth'])->group(function(){
    Route::controller(PostController::class)->group(function(){
        Route::post('/post/store', 'store')->name('post.store');
        Route::get('/post/create', 'create')->name('post.create');
        Route::get('/posts','index')->name('posts.index');
        Route::delete('/user/destroy/{id}','destroy')->name('post.destroy');
        Route::get('/post/{id}/edit/','edit')->name('post.edit');
        Route::post('/post/update/{id}','update')->name('post.update');
    });
    Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/user/create', [UserController::class,'create'])->name('users.create');
    Route::post('/user/store', [UserController::class,'store'])->name('users.store');

    // for edit
    Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('users.edit');
    Route::post('/user/update/{id}', [UserController::class,'update'])->name('users.update');
    Route::delete('/user/delete/{id}', [UserController::class,'destroy'])->name('users.destroy'); 
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

