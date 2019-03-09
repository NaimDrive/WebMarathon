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


Auth::routes();

Route::get('/', 'ControleurVisualisation@index')->name('home');

Route::get('/histoire/galerie','ControleurVisualisation@mesHistoires')->name('mes_histoires');
Route::get('/histoire/activation/enregistrer','ControleurCreation@enregistrerActivation')->name('enregistrer_activation');

Route::get('/histoire/creer', 'ControleurCreation@creerHistoire')->name('creer_histoire');
Route::post('/histoire/enregistrer', 'ControleurCreation@enregistrerHistoire')->name('enregistrer_histoire');

Route::get('/chapitre/creer', 'ControleurCreation@creerChapitre')->name('creer_chapitre');
Route::post('/chapitre/enregistrer', 'ControleurCreation@enregistrerChapitre')->name('enregistrer_chapitre');

Route::get('/chapitre/lier', 'ControleurCreation@lierChapitre')->name('lier_chapitre');
Route::get('/chapitre/lier/{id}', 'ControleurCreation@lierChapitre')->name('lier_chapitre2');
Route::post('/chapitre/lier/enregistrer', 'ControleurCreation@enregistrerLiaison')->name('enregistrer_liaison');


Route::get('/chapitre/{id}', 'ControleurVisualisation@chapitre')->name('chapitre');
Route::get('/histoire/{id}','ControleurVisualisation@histoire')->name('histoire');
Route::get('/suite/{id}', 'ControleurVisualisation@store')->name('store');

Route::get('users/{id}','ControleurVisualisation@tri')->name('users');