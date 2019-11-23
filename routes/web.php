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


//Pagina inicial ao logar
Route::get('/home','ProjectController@index')->name('project-index');

//Rota do logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


//Rotas das ações do projeto
Route::get('/addProjeto','ProjectController@store')->name('project.create');
Route::get('/editProject/{id}','ProjectController@update')->name('project.edit');

//Finalizar o projeto
Route::get('/projectFinish/{id}','ProjectController@projectFinish')->name('project.finish');

//Finalizar o projeto
Route::delete('/projectDestroy/{id}','ProjectController@destroy')->name('project.destroy');


//Editar projeto
Route::get('/editProject/{id}','ProjectController@update')->name('project.edit');

//Apoiar projeto
Route::get('/projectSupport/{id}','ProjectController@support')->name('project.support');

//Filtrar projeto
Route::get('/filterProject','ProjectController@filter')->name('project.filter');

//Rota meus projetos
Route::get('/myProjects','ProjectController@filterMyProjects')->name('project.myProjs');


//Página sobre
Route::get('/sobre', 'ProjectController@sobre')->name('sobre');







