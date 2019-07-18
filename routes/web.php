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

//rotta per la pagina bubblica
Route::get('/', 'PublicController@index');


//gestisce tutte le rotte di autenticazione
Auth::routes();


// tutte le rotte hanno bisogno del login <= middleware('auth')
// imposto il prefisso del gruppo <= prefix()
// imposto il percorso <= namespace()
// imposto il nome <= name()
// specifico che è un gruppo <= group(function{})
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
  // rotta per amministratore
  Route::get('/', 'HomeController@index')->name('home');
  // rotta che gestisce le CRUD
  Route::resource('posts', 'PostController');
});
