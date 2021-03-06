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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('customers')->group(function (){
    Route::get('/','CustomerController@index')->name('customers.list');
    Route::get('/create','CustomerController@create')->name('customers.create');
    Route::post('/create','CustomerController@store')->name('customers.store');
    Route::get('/{id}/edit','CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/edit','CustomerController@update')->name('customers.update');
    Route::get('/{id}/delete','CustomerController@destroy')->name('customers.destroy');
});

Route::prefix('students')->group(function (){
    Route::get('/','StudentController@index')->name('students.list');
    Route::get('/create','StudentController@create')->name('students.create');
    Route::post('/create','StudentController@store')->name('students.store');
    Route::get('/{id}/edit','StudentController@edit')->name('students.edit');
    Route::post('/{id}/edit','StudentController@update')->name('students.update');
    Route::get('/{id}/delete','StudentController@destroy')->name('students.destroy');
    Route::get('/filter','StudentController@filterByClass')->name('students.filterByClass');
});

Route::prefix('/classes')->group(function (){
    Route::get('/',"ClassController@getAll")->name('classes.list');
    Route::get('/{id}/edit','ClassController@showFormEdit')->name('classes.showFormEdit');
    Route::post('/{id}/edit','ClassController@edit')->name('classes.edit');

});
