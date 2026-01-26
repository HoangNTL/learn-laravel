<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id?}', function ($id = '123') {
        return view('product.detail', ['id' => $id]);
    })->where('id', '.*')->name('product.detail');
});

Route::get('/sinhvien/{name?}/{mssv?}', function ($name = 'Nguyen Tho Le Hoang', $mssv = '0031167') {
    return "Thông tin giới thiệu của sinh viên làm bài: $name, MSSV: $mssv";
});

Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

app('router')->fallback(function () {
    return response()->view('errors.404', [], 404);
});

// Auth routes
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
