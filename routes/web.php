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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trello', 'TrelloController@index');
Route::get('/trello/boards', 'TrelloController@boards');

Route::get('/trello/reghook', 'TrelloController@regHook');
Route::get('/trello/hooks', 'TrelloController@hooks');
Route::get('/trello/errorhooks', 'TrelloController@errorhooks');
Route::post('/trello/storehook', 'TrelloController@storeHook');
