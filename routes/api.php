<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\NoeticSchoolController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\StatesController;
use App\Models\Noetic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('noetic/create',[NoeticSchoolController::class,'create']);
Route::post('noetic/list',[NoeticSchoolController::class,'search']);
Route::post('/noetic/update',[NoeticSchoolController::class,'updated']);
Route::post('country',[CountriesController::class,'country']);
Route::post('state/{id}',[StatesController::class,'state']);
Route::post('city/{id}',[CitiesController::class,'city']);
Route::post('skill',[CountriesController::class,'skills']);
Route::post('create',[PersonalController::class,'created']);
Route::post('view',[PersonalController::class,'view']);
