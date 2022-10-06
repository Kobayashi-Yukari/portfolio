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

/*
ログインしている人
*/
Route::group(['middleware' => 'auth'], function() {
	//つぶやき関連
	Route::get('/top', 'PostController@index')->name('post.index');
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::post('/post/store', 'PostController@store')->name('post.store');
	Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
	Route::post('/post/update', 'PostController@update')->name('post.update');
	Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
	//マイページ関連
	Route::get('/user/index', 'UserController@index')->name('user.index');
	//ファンレター関連
	Route::get('/letter/index', 'LetterController@index')->name('letter.index');
	Route::get('/letter/create', 'LetterController@create')->name('letter.create');
	Route::get('/letter/edit/{id}', 'LetterController@edit')->name('letter.edit');
	Route::post('/letter/update', 'LetterController@update')->name('letter.update');
	Route::post('/letter/preview', 'LetterController@preview')->name('letter.preview');
	Route::get('/letter/store/{id}', 'LetterController@store')->name('letter.store');
	Route::get('/letter/clancel/{id}', 'LetterController@cancel')->name('letter.cancel');
	//チャット関連
	Route::get('/contact/index', 'ContactController@index')->name('contact.index');
	Route::post('/contact/store', 'ContactController@store')->name('contact.store');
});

/*
メンバーと管理人のみアクセスok
*/
Route::group(['middleware' => 'MembersCheck'], function() {
	//member画面関連
	Route::get('/member/index', 'MemberController@index')->name('member.index');
	Route::get('/letter/flagChange/{id}', 'LetterController@flagChange')->name('letter.flagchange');
});

/*
管理人のみアクセスok
*/
Route::group(['middleware' => 'AdminCheck'], function() {
	//Admin画面関連
	Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
		Route::get('/index', 'Admin\AdminController@index')->name('index');
		Route::post('/post/store', 'Admin\PostController@store')->name('post.store');
		Route::get('/post/edit/{id}', 'Admin\PostController@edit')->name('post.edit');
		Route::post('/post/update', 'Admin\PostController@update')->name('post.update');
		Route::get('/post/destroy/{id}', 'Admin\PostController@destroy')->name('post.destroy');

		//チャット関連
		Route::post('/contact/reply', 'Admin\ContactController@reply')->name('contact.reply');
	});

});



