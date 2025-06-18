<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\WriteController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\accountController;


Route::get('/Signup', function () {
    return view('Signup');
});
Route::get('/Information', function () {
    return view('Information');
});
Route::get('/', function () {
    return view('Login');
});

Route::get('/HomePage', [HomePageController::class, 'index']);

Route::get('/write', function () {
    return view('write');
});
Route::get('/Account', function () {
    return view('Account');
});
Route::get('/EditAccount', function () {
    return view('Edit_account');
});
Route::get('/Read', function () {
    return view('Read');
});
Route::get('/List', function () {
    return view('List');
});
Route::get('/List', [ListController::class, 'likedList']);

Route::get('/Account', [accountController::class, 'account']);

Route::get('/Read', [ReadController::class, 'show']);

Route::get('/MyDrafts', [WriteController::class, 'myDrafts'])->name('mydrafts');

Route::get('/EditPost/{id}', [WriteController::class, 'edit'])->name('editpost');


Route::post('/Signup', [SignupController::class, 'register'])->name('signup');
Route::post('/Login', [LoginController::class, 'Login'])->name('login');
Route::post('/Information', [InformationController::class, 'Information'])->name('Information');
Route::post('/Read/comment', [ReadController::class, 'addComment'])->name('read.comment');
Route::post('/Read/like', [ReadController::class, 'like'])->name('read.like');
Route::post('/write', [WriteController::class, 'store'])->name('write.post');
Route::post('/EditPost/{id}', [WriteController::class, 'update'])->name('updatepost');
//signup login homepage information