<?php

use App\Http\Middleware\Revisor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/chisiamo', [PublicController::class, 'chiSiamo'])->name('chiSiamo');

Route::middleware(['auth'])->group(function () {
    Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');
    Route::get('/product/index', [ProductController::class, 'index'])->name('productIndex');
    Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('productShow');
    Route::get('/product/category/{category}', [ProductController::class, 'prodByCategory'])->name('byCategory');
    Route::get('/product/show/{product}' , [ProductController::class , 'show'])->name('productShow');
    Route::get('/product/user/{user}', [ProductController::class, 'prodByUser'])->name('byUser');
    Route::post('/contact/submit' , [PublicController::class , 'submitContact'])->name('submitContact');
    Route::get('/contact' , [PublicController::class , 'contact'])->name('contact');
    Route::get('/search/product' , [PublicController::class , 'searchProducts'])->name('searchProduct');
    Route::post('/product/favorite/{id}', [ProductController::class, 'addFavorite'])->name('addFavorite');
    Route::delete('/product/unfavorite/{id}', [ProductController::class, 'removeFavorite'])->name('removeFavorite');
    Route::get('/product/favorites', [ProductController::class, 'favorites'])->name('productFavorites');
    Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});


Route::middleware(Revisor::class)->group(function () {
    Route::get('/revisor/index', [RevisorController::class, 'revisorIndex'])->name('revisorIndex');
    Route::patch('/revisor/approve/{product}', [RevisorController::class, 'revisorApprove'])->name('revisorApprove');
    Route::patch('/revisor/reject/{product}', [RevisorController::class, 'revisorReject'])->name('revisorReject');
    Route::post('/revisor/undo', [RevisorController::class, 'undoAction'])->name('revisorUndo');
});

Route::get('/revisor/{user}' , [RevisorController::class , 'makeRevisor'])->name('makeRevisor');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');
