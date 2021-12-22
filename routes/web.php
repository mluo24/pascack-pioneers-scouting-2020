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
})->name('welcome')->middleware('guest');

Route::get('/settings', 'SettingsController@index')->name('settings')->middleware('auth');
Route::post('/settings', 'SettingsController@changeSettings')->name('settings.change')->middleware('auth');
Route::post('/home', 'SettingsController@setSessionVariables')->name('settings.session');
// Route::get('/welcome', function () {
//     return view('welcome');
// })->name('welcome');


Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/home', 'HomeController@index')->name('home');
Route::resources([
    'scout' => 'DataEntryController',
    'pitscout' => 'PitDataEntryController',
    'users' => 'UserController'
]);
Route::get('/justinform', 'DataEntryController@justinView')->name('justinform');
Route::post('/scout/teamlist', 'DataEntryController@getTeamList')->name('scout.teamlist');
Route::get('/teams', 'PitDataEntryController@teamView')->name('teamview');
Route::get('/teams/{teamid}', 'PitDataEntryController@singleTeamView')->name('singleteamview');
Route::get('/matches', 'PitDataEntryController@matchView')->name('matchview');
// Route::get('/matches/{match}', 'PitDataEntryController@singleMatchView')->name('singlematchview');

