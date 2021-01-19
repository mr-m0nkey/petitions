<?php

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

Route::get('/petition', 'PetitionController@getFeaturedPetition');
Route::get('/petition/upvote/{id}', 'PetitionController@upvotePetition');
Route::get('/petition/downvote/{id}', 'PetitionController@downVotePetition');



Route::get('/', 'PetitionController@home');
