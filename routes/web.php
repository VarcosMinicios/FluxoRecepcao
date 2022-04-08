<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MedicalController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/list', ListController::class)->name('list');

Route::controller(RegisterController::class)->group(function() 
{

    Route::get('/register', 'create')->name('register_create');

    Route::post('/register', 'store')->name('register_store');

    Route::get('/register/{id}/edit', 'edit')->name('register_edit');

    Route::patch('/register/{id}', 'update')->name('register_update');

    Route::delete('/register/{id}/delete', 'destroy')->name('register_destroy');

});

Route::controller(AttendanceController::class)->group(function() 
{

    Route::get('/attendance/{id}', 'create')->name('attendance_create');

    Route::post('/attendance', 'store')->name('attendance_store');

});

Route::controller(MedicalController::class)->group(function () 
{

    Route::get('/medicalList', 'index')->name('medical_index');

    Route::get('/medicalList/{id}/{attendance_id}', 'create')->name('medical_create');

    Route::post('/medicalList', 'store')->name('medical_store');

    Route::get('/medicalList/{id}/{attendance_id}/{treatment_id}', 'edit')->name('medical_treatment');

    Route::get('/medicalList/sorted', 'show')->name('medical_show');

    Route::patch('/medicalList/{id}', 'update')->name('medical_finalize');

});
