<?php

// Auth and Login stuff
$router->get('/login', ['as' => 'login.create', 'uses' => 'Auth\\AuthController@getLogin']);
$router->post('/login', ['as' => 'login.store', 'uses' => 'Auth\\AuthController@postLogin']);

$router->any('/logout', ['as' => 'logout', 'uses' => 'Auth\\AuthController@getLogout']);

$router->get('/signup', ['as' => 'signup.create', 'uses' => 'Auth\\AuthController@getRegister']);
$router->post('/signup', ['as' => 'signup.store', 'uses' => 'Auth\\AuthController@postRegister']);

$router->group(['middleware' => 'auth'], function($router) {

    $router->get('/', ['as' => 'practices.index', 'uses' => 'PracticesController@index']);
    $router->get('/practices/{id}', ['as' => 'practices.details', 'uses' => 'PracticesController@details']);

    $router->get('/new', ['as' => 'practices.create', 'uses' => 'PracticesController@create']);
    $router->post('/new', ['as' => 'practices.start', 'uses' => 'PracticesController@start']);

    $router->get('/practice', ['as' => 'current-practice.go', 'uses' => 'CurrentPracticeController@go']);
    $router->post('/practice', ['as' => 'current-practice.store', 'uses' => 'CurrentPracticeController@store']);
    $router->get('/results', ['as' => 'current-practice.result', 'uses' => 'CurrentPracticeController@result']);

});
