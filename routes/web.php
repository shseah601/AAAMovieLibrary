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
// view pages
Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/browse', 'PagesController@getBrowse');

//submit contact
Route::post('/contact/submit', 'MessagesController@submit');
//get all movies
Route::get('/movies', 'MoviesController@getMovies');
Route::post('/movies/click', 'MoviesController@getMovie');
//add,delete,update movie
Route::post('/add/add', 'MoviesController@add');
Route::post('/delete/delete', 'MoviesController@delete');
Route::post('/update/update', 'MoviesController@update');
Route::post('/search', 'MoviesController@search');
Route::post('/searchTitle', 'MoviesController@searchTitle');

// Route::post('/loginPage/login','UserController@login');

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function (){
  Route::get('/login',['as' => 'login', 'uses' => 'AuthController@login']);
  Route::post('/handleLogin',['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
  //return all messages
  Route::get('/messages',['as' => 'messages', 'uses' => 'UserController@getMessages']);
  Route::get('/edit',['middleware' =>'auth', 'as' => 'edit', 'uses' => 'UserController@getEdit']);
  Route::get('/add', ['middleware' =>'auth', 'as' => 'add', 'uses' => 'UserController@getAdd']);
  Route::get('/delete', ['middleware' =>'auth', 'as' => 'delete', 'uses' => 'UserController@getDelete']);
  Route::get('/updatetable', ['middleware' =>'auth', 'as' => 'updatetable', 'uses' => 'UserController@getUpdateTable']);
  Route::post('/update', ['middleware' =>'auth', 'as' => 'update', 'uses' => 'UserController@getUpdate']);
  Route::get('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);
});
