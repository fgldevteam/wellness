<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});

$app->get('/stores', 'Controller@getStoreList');
$app->get('/storenumbers', 'Controller@getAllStores');
$app->get('/banners', 'Controller@getBannerList');
$app->get('/store/{id}', 'Controller@getStoreByStoreid');
$app->get('/banner/{id:\d+}', 'Controller@getStoreByBannerid');
$app->get('/banner/{name:[a-zA-Z]+}', 'Controller@getStoreByBannername');
$app->get('/city/{name:[a-zA-Z]+}', 'Controller@getStoreByCity');
$app->get('/province/{name:[a-zA-Z]+}', 'Controller@getStoreByProvince');
$app->get('/district/{id:\d+}', 'Controller@getStoreByDistrictid');

$app->get('/login', 'Auth\AuthController@getLogin');
$app->post('/login', 'Auth\AuthController@postLogin');
$app->get('/register', 'Auth\AuthController@getRegister');
$app->post('/register', 'Auth\AuthController@postRegister');