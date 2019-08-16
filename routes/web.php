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


$router->get('/', function () use ($router) {
    return $router->app->version();
    return "Access Grantedsdsd";
});


$router->get('/hello/', 'ExampleController@hello');

$router->get('/para/{id}/{name}', 'ExampleController@withParameter');

$router->get('/midware/', ['middleware'=>'midware',function(){
    return "Access Granted";
}]);



$router->get('/users/get', [
    'middleware' => 'jwt.auth',
    'uses' => 'UserController@getAllusers'
]);



$router->post(
    'auth/login',
    [
        'uses' => 'AuthController@authenticate'
    ]
);


$router->post('/users/create', 'UserController@createUsers');
$router->put('/users/update','UserController@editUsers');
$router->delete('/users/delete', 'UserController@deleteUsers');


