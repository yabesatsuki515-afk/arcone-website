<?php

use App\Http\Controllers\ContactInquiryController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/works', [PageController::class, 'works'])->name('works');
Route::redirect('/howto', '/');
Route::redirect('/about', '/');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/contact', [ContactInquiryController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');
