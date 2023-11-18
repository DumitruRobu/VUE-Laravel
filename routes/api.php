<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'App\Http\Controllers', 'prefix'=>'person'], function(){
    Route::post('/add', 'AddPersonController');
    Route::get('/getPeople', 'GetAllPeopleController');
    Route::get('/deletePerson/{id}', 'DeletePersonController');
    Route::get('/getPerson/{id}', 'GetPersonController');
    Route::get('/editPerson/{id}', 'EditPersonController');
    Route::post('/updatePerson/{id}', 'UpdatePersonController');
});
