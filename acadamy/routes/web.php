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
Route::get('/home', function () {
    return view('home');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/team', function () {
    return view('teamregistration');
});
// Route::get('/session', function () {
//     return view('sessionregistration');
// });
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');
Route::post('player', 'RegistrationController@createPlayer');
Route::get('session', 'SessionController@getSession');
