<?php

Route::get('/', function () {
    return view('welcome');
});
// autentification
// Route::get('register', 'RegisterController@index')->name('register');
Auth::routes();
Route::namespace('\App\Http\Controllers\Auth')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::post('register','RegisterController@store')->name('store');
});
// home page
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search', 'UserController@search')->name('search.user');
// admin panel
Route::get('/admin/schedule', 'AdminController@schedule')->name('admin.schedule');
Route::resource('/admin', 'AdminController');
//users profile
Route::get('user/profile', 'UserController@index')->name('user.profile');
Route::get('user/profile/edit', 'UserController@edit')->name('user.edit');
Route::post('user/profile', 'UserController@update')->name('profile.save');

Route::get('/user/news', 'UserController@news')->name('user.news.index');
Route::get('/user/tasks', 'UserController@tasks')->name('user.tasks.index');
Route::get('/user/schedule', 'UserController@schedule')->name('user.schedule.index');
Route::get('/user/index', 'UserController@index')->name('user.index');
// news
Route::post('/news/search', 'NewsController@search')->name('search.news');
Route::get('/news/search', 'NewsController@index');
Route::resource('/news', 'NewsController');
//tasks
Route::post('/tasks/search', 'TaskController@search')->name('search.tasks');
Route::get('/tasks/search', 'TaskController@index');
Route::resource('/tasks', 'TaskController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/schedule/index', 'ScheduleController@index')->name('schedule');
Route::post('/schedule/store', 'ScheduleController@store');
Route::post('/schedule/update', 'ScheduleController@update');
Route::post('/schedule/delete', 'ScheduleController@destroy');
