<?php

//use Illuminate\Routing\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() { 
    Route::get('/',                      ['as' => 'user.index',   'uses' =>'UserController@index']);
    Route::get('/create',                ['as' => 'user.create',  'uses' =>'UserController@create']);
    Route::post('/',                     ['as' => 'user.store',   'uses' =>'UserController@store']);
    Route::get('/{resource?}',           ['as' => 'user.show',    'uses' =>'UserController@show']);
    Route::get('/{resource?}/edit',      ['as' => 'user.edit',    'uses' =>'UserController@edit']);
    Route::put('/{resource?}',           ['as' => 'user.update',  'uses' =>'UserController@update']);
    Route::delete('/destroy/{resource?}',['as' => 'user.destroy', 'uses' =>'UserController@destroy']);
});

Route::group(['prefix' => 'book'], function() {  
    Route::get('/',                      ['as' => 'book.index',   'uses' =>'BookController@index']);
    Route::get('/create',                ['as' => 'book.create',  'uses' =>'BookController@create']);
    Route::post('/',                     ['as' => 'book.store',   'uses' =>'BookController@store']);
    Route::get('/{resource?}',           ['as' => 'book.show',    'uses' =>'BookController@show']);
    Route::get('/{resource?}/edit',      ['as' => 'book.edit',    'uses' =>'BookController@edit']);
    Route::put('/{resource?}',           ['as' => 'book.update',  'uses' =>'BookController@update']);
    Route::delete('/destroy/{resource?}',['as' => 'book.destroy', 'uses' =>'BookController@destroy']);
});

Route::resource('/category', 'CategoryController');
Route::resource('/lend', 'LendController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
