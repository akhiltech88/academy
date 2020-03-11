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
// Route::get('/registration', function () {
//     return view('registration');
// });
Route::get('/teamregistration', function () {
    return view('teamregistration');
});
Route::get('/payments', function () {
    return view('payments');
});
// Route::get('/session', function () {
//     return view('sessionregistration');
// });
Route::get('registration', 'RegistrationController@getRegistration');
Route::post('player_register', 'RegistrationController@createPlayer');
Route::get('playerlist', 'RegistrationController@playerList');
Route::post('team_register', 'TeamController@createTeam');
Route::get('teamlist', 'TeamController@teamList');
Route::get('session', 'SessionController@getSession');
Route::post('session', 'SessionController@saveSession');
Route::post('team_session', 'SessionController@saveTeamSession');
Route::get('player/{id}/session', 'SessionController@getSessionById');
Route::get('user/verify/{verificationCode}', 'UserController@verifyUserEmail');
Route::post('status_update', 'SessionController@statusUpdate');
Route::get('userlist', 'UserController@userList');
Route::get('userdetails/{id}', 'RegistrationController@playerListByUser');
Route::get('playerprofile/{id}', 'RegistrationController@playerProfile');
Route::get('userdetails', 'UserController@userDetails');
Route::get('/playerdelete/{id}','RegistrationController@deletePlayer');
});