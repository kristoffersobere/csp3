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
Route::get('welcome', 'PagesController@wall');
Route::get('/', 'PagesController@index');

Route::resource('post','PostsController');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('/profile/edit', 'ProfileController@update');
Route::get('search/{text}', 'ProfileController@searchUser');

Route::post('addfriend', 'FriendController@store')->name('addfriend');
Route::get('addfriend/delete/{id}', 'FriendController@destroy');
// Route::resource('post','PostsController' , ['only' => [
//     'create', 'store', 'destroy' ,'edit'
// ]]);
// Route::post('post/{id}/update','PostsController@update');

// Route::get('/','CommentsController@index');
// Route::post('/','CommentsController@store');

Route::get('comments','CommentsController@index');
Route::post('comments','CommentsController@store');
Route::get('comments/delete/{friend}','CommentsController@destroy');
Route::get('admin/comments/delete/{friend}','CommentsController@destroy');

Auth::routes();

Route::get('/home', 'PostsController@index')->name('home');

//Route::get('/chat', 'ChatController@index');

Route::get('chat/{id}', 'ChatController@show')->name('chat.show');
Route::post('chat/getChat/sendmsg', 'ChatController@store');
Route::get('/chat/getChat/{id}', 'ChatController@getChat')->name('chat.show');


Route::get('admin/home', 'AdminController@index');
Route::get('admin/delete-user/{id}', 'AdminController@deleteUser');

Route::POST('admin','Admin\LoginController@login'); 
Route::GET('admin','Admin\LoginController@showLoginForm')->name('adminlogin');           
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


Route::POST('admin-register','Admin\RegisterController@register');             
Route::GET('admin-register','Admin\RegisterController@showRegistrationForm')->name('admin-register');