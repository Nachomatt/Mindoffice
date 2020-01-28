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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');
Route::get('users/{user}/roleEdit', 'UserController@roleEdit')->name('users.roleEdit');
Route::put('users/{user}/roleEdit', 'UserController@roleUpdate')->name('users.roleUpdate');
Route::get('users/{user}/permissionEdit', 'UserController@permissionEdit')->name('users.permissionEdit');
Route::put('users/{user}/permissionEdit', 'UserController@permissionUpdate')->name('users.permissionUpdate');
Route::resource('users', 'UserController');