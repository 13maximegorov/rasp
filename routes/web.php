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

Route::get('/', 'IndexController@index');
Route::get('/teachers', 'IndexController@teachers');
Route::post('/teachers', 'IndexController@getTeacherShedule');
Route::get('/students', 'IndexController@students');
Route::post('/students', 'IndexController@getGroupShedule');
Route::get('/result-student', 'IndexController@resultStudent');
Route::get('/result-teacher', 'IndexController@resultTeacher');
