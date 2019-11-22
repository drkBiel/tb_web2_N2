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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::get('/home','ProjectController@index')->name('project-index');
Auth::routes();

//Rotas das ações do projeto
Route::get('/addProjeto','ProjectController@store')->name('project.create');
Route::get('/editProject/{id}','ProjectController@update')->name('project.edit');

Route::get('/projectFinish/{id}','ProjectController@projectFinish')->name('project.finish');

Route::get('/editProject/{id}','ProjectController@update')->name('project.edit');
Route::get('/projectSupport/{id}','ProjectController@support')->name('project.support');


Route::get('/sobre', 'ProjectController@sobre')->name('sobre');







