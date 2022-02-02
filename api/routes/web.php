<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return 'API Multipedidos - '.date('d/m/Y');
});

$router->group(['prefix'=>'api/v1'], function() use($router){

    $router->get('/users', 'UserController@index');
    $router->post('/user', 'UserController@create');
    $router->get('/user/{id}', 'UserController@show');
    $router->put('/user/{id}', 'UserController@update');
    $router->delete('/user/{id}', 'UserController@destroy');
    $router->post('/users/search', 'UserController@search');
});
