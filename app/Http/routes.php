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

$rest = function ($path, $controller) use ($app)
{
    $app->get($path, $controller.'@index');
    $app->get($path.'/{id}', $controller.'@show');
    $app->post($path, $controller.'@store');
    $app->put($path.'/{id}', $controller.'@update');
    $app->patch($path.'/{id}', $controller.'@update');
    $app->delete($path.'/{id}', $controller.'@destroy');
};

$rest('project', 'App\Http\Controllers\ProjectController');
$rest('author', 'App\Http\Controllers\AuthorController');
$rest('user-story', 'App\Http\Controllers\UserStoryController');
$rest('task', 'App\Http\Controllers\TaskController');
$rest('additional-time-requirement', 'App\Http\Controllers\AdditionalTimeRequirementController');