<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Patients;
use App\Http\Livewire\Vaccinators;
use App\Http\Livewire\Prints;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('dashboard',Dashboard::class)->middleware(['auth:sanctum', 'verified'])->name('dashboard');
Route::get('patients',Patients::class)->middleware(['auth:sanctum', 'verified'])->name('patients');
Route::get('vaccinators',Vaccinators::class)->middleware(['auth:sanctum', 'verified'])->name('vaccinators');
//Route::get('prints',Prints::class)->middleware(['auth:sanctum', 'verified'])->name('prints');


Route::get('prints', 'App\Http\Controllers\PrintsController@index')->name('prints');