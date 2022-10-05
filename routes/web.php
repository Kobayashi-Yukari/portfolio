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


Route::get('/top', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::get('/user/index', 'UserController@index')->name('user.index');
Route::post('/post/update', 'PostController@update')->name('post.update');
Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');

//ファンレター関連
Route::get('/letter/index', 'LetterController@index')->name('letter.index');
Route::get('/letter/create', 'LetterController@create')->name('letter.create');
Route::get('/letter/edit/{id}', 'LetterController@edit')->name('letter.edit');
Route::post('/letter/update', 'LetterController@update')->name('letter.update');
Route::post('/letter/preview', 'LetterController@preview')->name('letter.preview');
Route::get('/letter/store/{id}', 'LetterController@store')->name('letter.store');
Route::get('/letter/clancel/{id}', 'LetterController@cancel')->name('letter.cancel');
