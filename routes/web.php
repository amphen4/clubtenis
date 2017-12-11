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

Route::get('/','FrontEndController@home');


Route::get('/noticias/{slug}', 'FrontEndController@mostrarNoticia');

Route::get('imagenes/carrousel/{filename}',[
        'uses' => 'FrontEndController@mostrarImagenCarrousel',
        'as' => 'wea2'
  ]);
Route::get('imagenes/galeria/{filename}',[
        'uses' => 'FrontEndController@mostrarImagenGaleria',
        'as' => 'wea3'
  ]);
Route::get('imagenes/noticias/{filename}',[
        'uses' => 'FrontEndController@mostrarImagenNoticias',
        'as' => 'wea4'
  ]);
Route::get('imagenes/otros/{filename}',[
        'uses' => 'FrontEndController@mostrarImagenOtros',
        'as' => 'wea5'
  ]);
Route::get('imagenes/galeria/{filename}',[
        'uses' => 'FrontEndController@mostrarImagenGaleria',
        'as' => 'wea5'
  ]);

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/rankings/resultado/{modalidad}', 'AdminRankingsController@mostrarFormulario');
  Route::post('/rankings/resultado', 'AdminRankingsController@registrar');

  Route::resource('torneos','AdminTorneosController');
  Route::post('/torneos/cerrar','AdminTorneosController@cerrar');
  Route::post('/torneos/partido','AdminTorneosController@actualizarPartido');

  Route::resource('socios','AdminSociosController');

  Route::resource('noticias','AdminNoticiasController');

  Route::get('/ruts','AdminSociosController@mostrarRuts');
  Route::post('/eliminarRut','AdminSociosController@eliminarRut');
  Route::post('/agregarRut','AdminSociosController@agregarRut');

  Route::get('/listas','TemporalController@mostrarListas');
  Route::post('/listas','TemporalController@guardarListas');

  Route::resource('/galerias','AdminGaleriasController');
});

Route::group(['prefix' => 'socio'], function () {
  Route::get('/login', 'SocioAuth\LoginController@showLoginForm');
  Route::post('/login', 'SocioAuth\LoginController@login');
  Route::post('/logout', 'SocioAuth\LoginController@logout');

  Route::get('/register', 'SocioAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'SocioAuth\RegisterController@register');

  Route::post('/password/email', 'SocioAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'SocioAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'SocioAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'SocioAuth\ResetPasswordController@showResetForm');

  Route::get('/players/misresultados','SocioRankingsController@misResultados');
  Route::get('players/create/{modalidad}','SocioPlayersController@create');
  Route::resource('players','SocioPlayersController', ['except' => ['create','index']]);

  Route::get('rankings/{modalidad}/inscribir','SocioRankingsController@inscribir');
  Route::resource('rankings','SocioRankingsController');

  Route::resource('torneos','SocioTorneosController');
  Route::post('/torneos/inscribir','SocioTorneosController@inscribir');
  Route::post('/torneos/desinscribir','SocioTorneosController@desinscribir');

  Route::resource('perfil','SocioPerfilController');
  
  Route::get('imagenes/{filename}',[
        'uses' => 'SocioPerfilController@mostrarImagen',
        'as' => 'wea2'
  ]);

  Route::get('arriendos','SocioArriendosController@mostrarCalendario');

});


/*
Route::group(['prefix' => 'usuario'], function () {
  Route::get('/login', 'UsuarioAuth\LoginController@showLoginForm');
  Route::post('/login', 'UsuarioAuth\LoginController@login');
  Route::post('/logout', 'UsuarioAuth\LoginController@logout');

  Route::get('/register', 'UsuarioAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'UsuarioAuth\RegisterController@register');

  Route::post('/password/email', 'UsuarioAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'UsuarioAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'UsuarioAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'UsuarioAuth\ResetPasswordController@showResetForm');
});*/
