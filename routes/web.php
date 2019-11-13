<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('chat', ['middleware' => ['cors'], 'uses' => 'ChatController@index']);
$router->post('chat', ['middleware' => ['cors'], 'uses' => 'ChatController@chat']);
$router->get('time', 'ChatController@nowTime');

$router->post('/apply', 'ChatController@apply');
$router->post('/login', 'MahasiswaController@login');
$router->get('/logout', 'MahasiswaController@logout');
$router->get('/user/{nim}', 'MahasiswaController@get_user');
$router->get('/riwayat/{nim}', 'MahasiswaController@get_history');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
