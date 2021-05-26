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
 
Auth::routes();
 
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/','LogController@index')->name('home');
Route::get('/home','LogController@index')->name('home');
Route::get('/article/{id}','ArticleController@show_index');
Route::get('/article/show/{id2}','ArticleController@show');
Route::get('/question/{id}','QuestionController@show_index');
Route::get('/question/show/{id2}','QuestionController@show');
Route::get('/user/{id}','HomeController@show');
Route::post('/memo','PostController@store');

 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/question/show_miss/{id}','QuestionController@show_miss');
    Route::post('/homework','HomeworkController@store');
    Route::post('/homework_edit','HomeworkController@edit');
    Route::get('/homework/{id}','ReplyController@show');
    route::post('/user','LogController@edit');  
});
 
/*
|--------------------------------------------------------------------------
| 3) Admin login
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後のみ可
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home'); 
    Route::get('make','Admin\HomeController@create');
    Route::get('homework','HomeworkController@index'); 
    Route::get('question','QuestionController@create'); 
    Route::get('message','NotificationController@index');
    Route::get('article','ArticleController@index'); 
    Route::get('edit/{id}','Admin\HomeController@edit');
    Route::post('edit','Admin\HomeController@change'); 
    
    
});
Route::post('csv','QuestionController@store_csv');
Route::post('make','ArticleController@store');
Route::post('reply','ReplyController@store');
Route::post('reply_edit','ReplyController@edit');
Route::post('log','LogController@store');
Route::post('log2','Log2Controller@store');
Route::post('notification','NotificationController@store');
Route::post('message','NotificationController@destroy');
Route::post('article','ArticleController@destroy');



