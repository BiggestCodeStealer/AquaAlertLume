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
    return $router->app->version();
});

$router->options('{all:.*}', function () use ($router) {
    return response()->json();
});

$router->post('login','AuthController@login');
 /*
$router->get('users',['middleware' => 'auth', 'uses' => 'UsersController@index']);
$router->get('users/{id}','UsersController@show');
$router->post('users','UsersController@store');
$router->put('users/{id}','UsersController@update');
$router->delete('users/{id}','UsersController@destroy');
*/
function recurso($router, $url, $modelo){
    $router->get("$url",$modelo."Controller@index");
    $router->get("$url/{id}",$modelo."Controller@show");
    $router->post("$url",$modelo."Controller@store");
    $router->put("$url/{id}",$modelo."Controller@update");
    $router->delete("$url/{id}",$modelo."Controller@destroy");
}

$router->group(['middleware' => 'auth'], function () use($router) {
    recurso($router, 'users', 'Users');
    recurso($router, 'sensors', 'Sensors');
    recurso($router, 'recordatorios', 'Recordatorios');
});

$router->get("estado/{id}","SensorsController@estado");