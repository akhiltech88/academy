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
    return view('site');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('signup');
});
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');

Route::group(['middleware' => ['web_login']], function () {
Route::get('/home', function () {
    return view('home');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/teamregistration', function () {
    return view('teamregistration');
});
// Route::get('/session', function () {
//     return view('sessionregistration');
// });
Route::post('player', 'RegistrationController@createPlayer');
Route::get('player', 'RegistrationController@playerList');
Route::post('team', 'TeamController@createTeam');
Route::get('team', 'TeamController@teamList');
Route::get('session', 'SessionController@getSession');
Route::post('session', 'SessionController@saveSession');
Route::post('team_session', 'SessionController@saveTeamSession');
Route::get('player/{id}/session', 'SessionController@getSessionById');
Route::get('user/verify/{verificationCode}', 'UserController@verifyUserEmail');
});