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

use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::get('timers/{timer}/stop', 'TimerController@stop')->name('timers.stop');

Route::get('timers/{timer}/pause', 'TimerController@pause')->name('timers.pause');

Route::get('timers/{timer}/start', 'TimerController@start')->name('timers.start');

Route::get('timers/{timer}/log', 'TimerController@log')->name('timers.log');

Route::post('timers/{timer}/log', 'TimerController@sendlog')->name('timers.sendlog');

Route::resource('timers', 'TimerController')->except('show');

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');

Route::get('users/{user}/roleEdit', 'UserController@roleEdit')->name('users.roleEdit');

Route::put('users/{user}/roleEdit', 'UserController@roleUpdate')->name('users.roleUpdate');

Route::get('users/{user}/permissionEdit', 'UserController@permissionEdit')->name('users.permissionEdit');

Route::put('users/{user}/permissionEdit', 'UserController@permissionUpdate')->name('users.permissionUpdate');

Route::resource('projects', 'ProjectController');

Route::resource('projectmembers', 'ProjectMemberController');

Route::resource('projects.projectmembers', 'ProjectMemberController');

Route::resource('projects.projectmembers.userhours', 'UserHourController');

Route::resource('permissionTypes', 'PermissionTypeController');

Route::get('/send-mail', function () {

    Mail::to('newuser@example.com')->send(new Email());

    return redirect(url('/home'))->with('message', 'Your mail has been sent '.Auth::user()->name.'. we will contact you soon.');

});
