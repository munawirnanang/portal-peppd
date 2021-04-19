<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home1', 'PagesController@home1');
Route::get('/home2', 'PagesController@home2');
Route::get('/home3', 'PagesController@home3');

Route::get('/guide', 'PagesController@guide');

// Route::get('/publication', 'PagesController@publication');
Route::get('/publication/{slug?}', 'PagesController@publication');

Route::get('/penghargaan', 'PagesController@penghargaan');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//user
Route::resource('user', 'UsersController');

//article
Route::get('article', 'ArticlesController@index');
Route::post('article/updateStatus', 'ArticlesController@updateStatus'); /* update status */
Route::post('article', 'ArticlesController@store');
Route::get('article/create', 'ArticlesController@create');
Route::get('article/{slug}/edit', 'ArticlesController@edit');
Route::patch('article/{slug}', 'ArticlesController@update');
Route::delete('article/{article}', 'ArticlesController@destroy');

//category
Route::get('category/index', 'CategoryController@index');
Route::post('category/store', 'CategoryController@store');
Route::put('category/update', 'CategoryController@update');
Route::delete('category/delete', 'CategoryController@destroy');

//Guide
Route::get('guidelines', 'GuidesController@index');
Route::post('guidelines', 'GuidesController@store');
Route::get('guidelines/create', 'GuidesController@create');
Route::get('guidelines/{id}/edit', 'GuidesController@edit');
Route::patch('guidelines/{guide}', 'GuidesController@update');
Route::delete('guidelines/{guide}', 'GuidesController@destroy');
