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

Route::get('/', function () {
    Organizer::find(1)->update(['password_hash' => Hash::make('demopass1')]);
    Organizer::find(2)->update(['password_hash' => Hash::make('demopass2')]);
    return Organizer::find(1);
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/','HomeController@index');
    Route::resource('/channels', 'ChannelController');
    Route::resource('/events', 'EventController');
    Route::resource('/reports', 'ReportController');
    Route::resource('/rooms', 'RoomController');
    Route::resource('/sessions', 'SessionController');
    Route::resource('/tickets', 'TicketController');
});

Route::get('/home', 'HomeController@index')->name('home');
