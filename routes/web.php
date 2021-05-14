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
    return redirect()->route('login');
});


Auth::routes(['register' => false]);
Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('roles','users\RoleController@index')->name('roles');
Route::post('roles','users\RoleController@store')->name('roles_store');
Route::put('roles/{id}','users\RoleController@update')->name('roles_update');
Route::delete('roles/{id}','users\RoleController@delete')->name('roles_delete');

Route::get('users','users\userController@index')->name("users");
Route::post('users','users\userController@store')->name("users_store");
Route::put('users/{id}','users\userController@update')->name("users_update");
Route::delete('users/{id}','users\userController@delete')->name("users_delete");
Route::get('users/search','users\userController@search')->name("search_users");

Route::get('profile','users\profileController@index')->name("profile");
Route::put('profile','users\profileController@update')->name("profile_update");
Route::put('profile/pass','users\profileController@update_password')->name("profile_update_password");

Route::get('forms','forms\formController@index')->name("forms");
Route::get('forms/create','forms\formController@create')->name("form_create");
Route::get('forms/{id}','forms\formController@show')->name("forms_show");
Route::get('forms/{id}/edit','forms\formController@edit')->name("forms_edit");
Route::get('forms/{id}/answer','forms\formController@answer')->name("forms_answer");
Route::post('forms','forms\formController@store')->name("forms_store");
Route::put('forms/{id}','forms\formController@update')->name("forms_update");
Route::delete('forms/{id}','forms\formController@delete')->name("forms_delete");
Route::get('forms/export/{id}','forms\formController@export')->name("forms_export");

Route::get('answers','answers\orderController@index')->name("answers")->middleware('verified')->middleware('auth');
Route::get('answers/{id}','answers\orderController@show')->name("answers_show")->middleware('verified')->middleware('auth');
Route::get('answer/{form}/{user}','answers\orderController@create')->name("answers_create");
Route::post('answers','answers\orderController@store')->name("answers_store");
Route::get('answer/ready','answers\orderController@ready')->name("answers_ready");
Route::delete('answer/{id}','answers\orderController@delete')->name("answers_delete");

Route::get('clients','clients\clientController@index')->name("clients");

Route::get('notifications/{id}/markerAsRead','HomeController@notification_read')->name('notification_read');