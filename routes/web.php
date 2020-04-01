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
Route::get('/user','HomeController@acl')->name('user');
Route::get('/user-reg','AdminAuthController@showRegistrationForm')->name('registration-form');
Route::post('/sign-up','AdminAuthController@postSingUp')->name('sign-up');
Route::post('/update-role','AdminAuthController@postAssignRole')->name('update-role');

Route::group(['middleware' =>'roles','roles'=>['Author']], function()
{
    Route::get('/author', 'HomeController@getAuthorPage')->name('get-author');
    Route::get('/show-post/{post_id}', 'HomeController@ShowPost')->name('show-post');
    Route::post('/post','HomeController@savePost')->name('save-post');

});
Route::group(['middleware' =>'roles','roles'=>['Admin']], function()
{
    Route::get('/admin', 'HomeController@getAdminPage')->name('get-admin');

});
Route::group(['middleware' =>'roles','roles'=>['User']], function()
{
    Route::get('/user', 'HomeController@getUserPage')->name('get-user');

});
Route::get('pushNotification','pushNotification@sendNotification');
Route::group(['middleware' =>'roles','roles'=>['Visitor']], function()
{
    Route::get('/visitor', 'HomeController@getVisitorPage')->name('get-visitor');

});