<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/', [SiteController::class, 'index'])->name ('home');

Route::get('/about', [SiteController::class, 'about'])->name ('about');

Route::get('/buy', [SiteController::class, 'buy'])->name ('buy');

Route::get('/contact', [SiteController::class, 'contact'])->name ('contact');

Route::get('/login', [SiteController::class, 'login'])->name ('login');

Route::get('/properties', [SiteController::class, 'properties'])->name ('properties');

Route::get('/property_details/{property_id}', [SiteController::class, 'property_details'])->name ('property_details');

Route::get('/search/type/{type}/status/{status}', [SiteController::class, 'search'])->name ('search');

Route::get('/type/{type}', [SiteController::class, 'type'])->name ('type');

Route::get('/sort/{type}', [SiteController::class, 'sort'])->name ('sort');


Route::get('/register', [SiteController::class, 'register'])->name ('register');

Route::get('/rent', [SiteController::class, 'rent'])->name ('rent');



//Route::post('/send', [SiteController::class, 'store'])->name('send');

