<?php

use Illuminate\Support\Facades\Route;
use App\Organizer;
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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/','HomeController@index');
    Route::resource('/events', 'EventController');
    Route::resource('/events/{event}/channels', 'ChannelController', ['only ' => ['create','store']]);
    Route::resource('/events/{event}/ticket', 'TicketController', ['only ' => ['create','store']]);
    Route::resource('/events/{event}/sessions', 'SessionController', ['only' => ['create','store','edit','update']]);
    Route::resource('/events/{event}/rooms', 'RoomController', ['only' => ['create','store','edit','update']]);
    Route::get('/events/{event}/reports/room-capacity', 'RoomController@capacity')->name('room_capacity');
    Route::resource('/reports', 'ReportController');
  
});

Route::get('/home', 'HomeController@index')->name('home');
