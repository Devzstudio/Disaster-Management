<?php
// Volunteer mark as cmopleted
//request delete



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('camps', 'UserController@camps');
Route::get('contacts', 'UserController@contacts');
Route::get('user/request/{id}', 'UserController@requestDetails');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('user/data/requests', 'HomeController@requests');

Route::get('profile', 'HomeController@profile');
Route::post('profile', 'HomeController@updateProfile');

Route::get('request', 'UserController@request');
Route::post('request', 'UserController@saveRequest');

Route::get('user/requst/status/{id}', 'HomeController@updateStatus');

Route::get('announcements', 'UserController@announcements');


Route::get('admin/', 'AdminController@index');
Route::get('admin/request/{id}', 'AdminController@viewRequest');
Route::get('admin/requests/processed', 'AdminController@processedRequest');
Route::get('admin/requst/status/{id}', 'AdminController@updateStatus');
Route::get('admin/requst/status/pending/{id}', 'AdminController@updateStatusPending');
Route::get('admin/requests/delete/{id}', 'AdminController@deleteRequest');

Route::get('admin/news', 'AdminController@news');
Route::get('admin/news/add', 'AdminController@addNews');
Route::post('admin/news/add', 'AdminController@storeNews');
Route::get('admin/news/edit/{id}', 'AdminController@editNews');
Route::post('admin/news/edit/{id}', 'AdminController@updateNews');
Route::get('admin/news/delete/{id}', 'AdminController@deleteNews');


Route::get('admin/camps', 'AdminController@camps');
Route::get('admin/camp/add', 'AdminController@newCamp');
Route::post('admin/camps/add', 'AdminController@storeCamp');
Route::get('admin/camp/edit/{id}', 'AdminController@editCamp');
Route::post('admin/camps/edit/{id}', 'AdminController@updateCamp');
Route::get('admin/camp/delete/{id}', 'AdminController@deleteCamp');

Route::get('admin/volunteers', 'AdminController@volunteers');
Route::get('admin/user/super/{id}', 'AdminController@superUser');
Route::get('admin/user/delete/{id}', 'AdminController@deleteUser');
Route::get('admin/requests', 'AdminController@requests');

Route::get('admin/contacts', 'AdminController@contacts');
Route::get('admin/contact/add', 'AdminController@addContact');
Route::post('admin/contact/add', 'AdminController@storeContact');
Route::get('admin/contact/edit/{id}', 'AdminController@editContact');
Route::post('admin/contact/edit/{id}', 'AdminController@updateContact');
Route::get('admin/contact/delete/{id}', 'AdminController@deleteContact');

// Admin Data handler
Route::get('admin/data/news', 'AdminDataController@news');
Route::get('admin/data/camps', 'AdminDataController@camps');
Route::get('admin/data/users', 'AdminDataController@users');
Route::get('admin/data/requests', 'AdminDataController@requests');
Route::get('admin/data/contacts', 'AdminDataController@contacts');
