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

//rotte pubbliche
Route::prefix('guest')->namespace('Guest')->name('guest.')->group(function() {
  Route::get('/', 'PublicController@index')->name('home');
  Route::get('/show/{title_slug}', 'PublicController@show')->name('show');
  Route::get('/category/{category_slug}', 'PublicController@show_category')->name('category');
});

Route::get('/', function(){
  return redirect()->route('guest.home');
});

//gestisce tutte le rotte di autenticazione
Auth::routes();

// tutte le rotte hanno bisogno del login <= middleware('auth')
// imposto il prefisso del gruppo <= prefix()
// imposto il percorso <= namespace()
// imposto il nome <= name()
// specifico che è un gruppo <= group(function{})
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
  // rotta per amministratore
  Route::get('/', 'PostController@index')->name('home');
  // rotta che gestisce le CRUD
  Route::resource('post', 'PostController');
});
