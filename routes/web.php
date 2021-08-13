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

$router->get('/location', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->group(['prefix' => 'province'], function () use ($router) {
        $router->get('/', 'ProvinceController@index');
        $router->get('/{id}', 'ProvinceController@getById');
    });
    $router->group(['prefix' => 'district'], function () use ($router) {
        $router->get('/', 'DistrictController@index');
        $router->get('/{id}', 'DistrictController@getById');
    });
    $router->group(['prefix' => 'subdistrict'], function () use ($router) {
        $router->get('/', 'SubdistrictController@index');
        $router->get('/{id}', 'SubdistrictController@getById');
    });
    $router->group(['prefix' => 'village'], function () use ($router) {
        $router->get('/', 'VillageController@index');
        $router->get('/{id}', 'VillageController@getById');
    });
});
