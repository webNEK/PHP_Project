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
use App\Http\Controllers\Edit_accountController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SearchController;

//SignupController
Route::get('/Signup', function () {
    return view('Signup');
});
Route::post('/Signup', [SignupController::class, 'register'])->name('signup');
//

//LoginController
Route::post('/Login', [LoginController::class, 'Login'])->name('login');
Route::get('/Login', function () {
    return view('Login');
});
//
//AdminLoginController

Route::get('/AdminLogin', function () {
    return view('AdminLogin');
});
Route::post('/AdminLogin', [AdminLoginController::class, 'login'])->name('admin.login');

Route::middleware(['auth.session'])->group(function () {
    //InformationController
    Route::post('/Information', [InformationController::class, 'Information'])->name('Information');
    Route::get('/Information', function () {
        return view('Information');
    });
    //

    //HomePageController
    Route::get('/HomePage', [HomePageController::class, 'index']);
    //

    //AccountController
    Route::get('/Account', function () {
        return view('Account');
    });
    Route::get('/Account', [accountController::class, 'account']);
    Route::get('/Account/DeleteAccount', [accountController::class, 'deleteAccount'])->name('account.delete');
    Route::get('/Account/logout', [accountController::class, 'logout'])->name('account.logout');
    //

    //WriteController
    Route::get('/write', function () {
        return view('write');
    });
    Route::get('/write', [WriteController::class, 'show']);
    Route::post('/write', [WriteController::class, 'store'])->name('write.post');
    Route::get('/write/delete/{id}', [WriteController::class, 'delete'])->name('write.delete');
    //

    //ReadController
    Route::get('/Read', function () {
        return view('Read');
    });
    Route::get('/Read', [ReadController::class, 'show']);
    Route::post('/Read/comment', [ReadController::class, 'addComment'])->name('read.comment');
    Route::post('/Read/like', [ReadController::class, 'like'])->name('read.like');
    //

    //Edit_accountController
    Route::get('/EditAccount', [Edit_accountController::class, 'edit']);
    Route::put('/EditAccount', [Edit_accountController::class, 'update'])->name('account.update');
    //

    //ListController
    Route::get('/List', function () {
        return view('List');
    });
    Route::get('/List', [ListController::class, 'likedList']);
    //

    //SearchController
    Route::get('/Search', [SearchController::class, 'search'])->name('search');
    //
});
