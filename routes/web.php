<?php

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


Route::get('/', 'StudentController@index')->name('home');   //Define name as ->name('home')
// After craete the form like create.blade.php then link up the url into the navbar #Home,#Add New {{ url('/create') }}
Route::get('/create', 'StudentController@create')->name('create');
//insert data into the data base route method should be post method
Route::post('/create', 'StudentController@store')->name('store');
//For edit page:create a edit route
//link this edit route into the welcome.blade.php btn btnraised href="{{ route('edit',$student->id) }}" and create a function name edit into the StudentController.php
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
// For update page,update should be the post method because of  insert data into the database
Route::post('/update/{id}', 'StudentController@update')->name('update');
//For delete method Rote and create a delete m,ethod into the StudentController.php
Route::delete('/delete/{id}', 'StudentController@delete')->name('delete');




//Practicing Purpose
Route::get('/test', 'TestController@index');

Route::get('/user/{id}', function ($id) {
    return 'Your id is' . $id;
});