<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});Route::get('/getPersonnes','PersonneController@index');
Route::post('/addPersonne','PersonneController@store');
Route::delete('/SupprimerPersonne/{id}','PersonneController@destroy');
Route::get('/getPersonneByID/{id}','PersonneController@edit');
Route::patch('/updatePersonne/{id}','PersonneController@update');
Route::post('/addRendezvous','RendezVousController@store');