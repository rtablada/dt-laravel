<?php

$router->get('/login', ['as' => 'login.create', 'uses' => 'Auth\\AuthController@getLogin']);
$router->post('/login', ['as' => 'login.store', 'uses' => 'Auth\\AuthController@postLogin']);

$router->any('/logout', ['as' => 'logout', 'uses' => 'Auth\\AuthController@getLogout']);

$router->get('/signup', ['as' => 'signup.create', 'uses' => 'Auth\\AuthController@getRegister']);
$router->post('/signup', ['as' => 'signup.store', 'uses' => 'Auth\\AuthController@postRegister']);
