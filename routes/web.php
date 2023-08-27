<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
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



Route::prefix('cms/admin/')-> group(function (){
    Route::view('parent' , 'cms.parent');
Route::view('temp' , 'cms.temp');
Route::resource('countries' , CountryController::class);

Route::post('countries-update/{id}' , [CountryController::class,'update'])->name('countries-update');

//For Trashed routes
Route::get('countries-trashed',[CountryController::class ,'indexTrashed'])->name('countries-trashed');
Route::get('countries-restore/{id}',[CountryController::class ,'restore'])->name('countries-restore');
Route::get('countries-forceDelete/{id}',[CountryController::class ,'forceDelete'])->name('countries-forceDelete');
Route::get('countries-forceDeleteAll',[CountryController::class ,'forceDeleteAll'])->name('countries-forceDeleteAll');
Route::get('countries-trunCate',[CountryController::class ,'trunCate'])->name('countries-trunCate');


//For Cities

Route::resource('cities' , CityController::class);

Route::post('cities-update/{id}' , [CityController::class,'update'])->name('cities-update');
});