<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAge;

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
Route::get('/signin', [AuthController::class, 'SignIn'])->name('signin');
Route::post('/check-signin', [AuthController::class, 'CheckSignIn'])->name('check-signin');

// Age input and protected route
Route::get('/age', [AuthController::class, 'showAgeForm'])->name('age.form');
Route::post('/save-age', [AuthController::class, 'saveAge'])->name('age.save');

// Route test middleware tuổi
Route::get('/protected', function () {
    return 'Bạn đã đủ 18 tuổi!';
})->middleware('check.age');
