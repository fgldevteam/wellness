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

$app->get('/checkUserLastLoggedIn', 'Controller@checkUserLastLoggedIn'); //prevent people from logging stuff all the time

$app->get('/save', 'Controller@save'); //save a new record

$app->get('/getScoreboard', 'Controller@getScoreboard');

$app->get('/teamLists', 'Controller@teamLists');
