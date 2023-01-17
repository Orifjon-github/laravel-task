<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [MainController::class, 'main'])->name('main');

    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

    Route::get('application/{application}/answer', [\App\Http\Controllers\AnswerController::class, 'create'])
        ->name('answers.create')
        ->middleware('role:manager');
    Route::post('application/{application}/answer', [\App\Http\Controllers\AnswerController::class, 'store'])->name('answers.store');

    Route::get('answered-applications', [MainController::class, 'answered_applications'])
        ->name('answered_applications')
        ->middleware('role:manager');

    Route::resource('applications', \App\Http\Controllers\ApplicationController::class);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/photo/delete', [ProfileController::class, 'photo_delete'])->name('photo_delete');
});


require __DIR__.'/auth.php';
