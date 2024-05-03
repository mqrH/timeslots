<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PageController::class, 'index']);

Route::get('/test-slots/{interval}', [PageController::class, 'test']);

Route::get('/services', [PageController::class, 'services'])->name('pages.services');
Route::get('/staff', [PageController::class, 'staff'])->name('pages.staff');
Route::get('/schedule', [PageController::class, 'schedule'])->name('pages.schedule');

Route::get('/process-leave', 'LeaveController@processLeave');
