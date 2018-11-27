<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::group(['namespace' => '\Bissolli\NovaInboxTool\Http\Controllers'], function () {

    // Inbox routes
    Route::get('inbox', 'InboxController@index');

    // Thread routes
    //Route::get('messages-threads', 'MessageThreadController@search');
    //Route::post('messages-threads', 'MessageThreadController@store');
    Route::get('message-threads/{thread}', 'MessageThreadController@show');
    //Route::delete('messages-threads/{message-thread}', 'MessageThreadController@destroy');

    // Message routes
    //Route::get('messages', 'MessageController@search');
    //Route::post('messages', 'MessageController@store');
    //Route::get('messages/{message}', 'MessageController@show');
    //Route::put('messages/{message}', 'MessageController@update');
    //Route::delete('messages/{message}', 'MessageController@destroy');

});
