<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;




Route::get('/',[HomepageController::class,'index'])->name('index');
Route::get('/referanslarimiz',[HomepageController::class,'referanslarimiz'])->name('referanslarimiz');
Route::get('/iletisim',[HomepageController::class,'contact'])->name('contact');


Route::get('{title}/{id}.html',[HomepageController::class,'post'])->name('post');
Route::get('{title}/{id}/amp',[HomepageController::class,'postamp'])->name('post');


require __DIR__.'/auth.php';
require __DIR__.'/solaris.php';
