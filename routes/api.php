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
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('schedule', 'SchedulesController@get');
       
    Route::resource('working_hours', 'WorkingHoursController')->missing(function(){
        return response(['message' => 'Working Hours not found'], 404);
    })->except(['index, show, create, edit']);
    Route::get('working_hours/{working_hour}', 'WorkingHoursController@getOne')->missing(function(){
        return response(['message' => 'Working Hours not found'], 404);
    });
    Route::get('working_hours', 'WorkingHoursController@getAll'); 

    
    Route::resource('meetings', 'MeetingsController')->missing(function(){
        return response(['message' => 'Meeting not found'], 404);
    })->except(['index, show, create, edit']);
    Route::get('meetings/{meeting}', 'MeetingsController@getOne')->missing(function(){
        return response(['message' => 'Meeting not found'], 404);
    });
    Route::get('meetings', 'MeetingsController@getAll');
});
