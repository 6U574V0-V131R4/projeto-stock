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

##############################################################################################
#                                           GERAL                                            #
##############################################################################################

Route::get('/', 'Geral@index')->name('paginaInicial');

Route::get('/quadro_login', 'Geral@quadroLogin')->name('quadroLogin');

Route::get('/menu_inicial', 'Geral@menuInicial')->name('menuInicial');

Route::post('/verificar_login', 'Geral@verificarlogin')->name('verificarlogin');

Route::get('/login_invalido', 'Geral@loginInvalido')->name('loginInvalido');

Route::get('/logout', 'Geral@logout')->name('logout');







##############################################################################################
#                                           GESTÃO                                           #
##############################################################################################

Route::get('/home', 'Gestao@home')->name('home');

Route::get('/editar/{id}', 'Gestao@editar')->name('editar');

Route::post('/editarGuardar/{id}', 'Gestao@editarGuardar')->name('editarguardar');

Route::get('/novo', 'Gestao@novo')->name('novo');

Route::post('/novogravar', 'Gestao@novoGravar')->name('novogravar');

Route::get('/eliminar/{id}/{resposta?}', 'Gestao@eliminar')->name('eliminar');

Route::get('/adicionar/{id}', 'Gestao@adicionar')->name('adicionar');

Route::post('/adicionar/{id}', 'Gestao@adicionar')->name('adicionar');

Route::get('/subtrair/{id}', 'Gestao@subtrair')->name('subtrair');

Route::post('/subtrair/{id}', 'Gestao@subtrair')->name('subtrair');

Route::get('/movimentos', 'Gestao@movimentos')->name('movimentos');

Route::get('/limparregistromovimentos', 'Gestao@limparRegistroMovimentos')->name('limparregistromovimentos');







##############################################################################################
#                                           SETUP                                           #
##############################################################################################

Route::get('/setup', 'Geral@setup')->name('setup');

Route::get('/resetdb', 'Geral@resetdb')->name('resetdb');

Route::get('/inserirusuarios', 'Geral@inserirusuarios')->name('inserirusuarios');

Route::get('/inserirprodutos', 'Geral@inserirprodutos')->name('inserirprodutos');
