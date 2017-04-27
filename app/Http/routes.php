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
    return "sup";
});

//submitting record
$app->get('/api/verifyUser', 'Controller@verifyUser');
$app->get('/api/didUserLoginThisWeek/{id}', 'Controller@didUserLoginThisWeek'); //prevent people from logging stuff all the time
$app->get('/api/save', 'Controller@save'); //save a new record

//scores
$app->get('/api/scoreboard', 'Controller@getScoreboard');
$app->get('/api/getTeamScoringList/{id}', 'Controller@getTeamScoringList');
$app->get('/api/playerScore/{id}', 'Controller@getPlayerScore');
$app->get('/api/teamScore/{id}', 'Controller@getTeamScore');

//teams
$app->get('/api/team/{id}', 'Controller@getTeam');
$app->get('/api/teams', 'Controller@teamLists');

//player
$app->get('/api/player/{id}', 'Controller@getPlayer');
$app->get('/api/playerLeaders', 'Controller@playerLeaders');
