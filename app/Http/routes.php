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


    Route::auth();
    Route::get('/', 'HomeController@index');
    
    Route::get('/users', 'DashboardController@index');
    Route::resource('/users/programmes', 'ProgrammesController');
    Route::resource('/users/centers', 'CentersController');
    Route::resource('/users/tickers', 'TickersController');
    Route::get('/users/attendances/{id}/day/{session}',['as' => 'users.attendances.showb', 'uses' => 'AttendancesController@showb' ]);
    Route::resource('/users/attendances', 'AttendancesController');
    Route::resource('/users/schools', 'SchoolsController');
    Route::resource('/users/registrations', 'RegistrationsController');
    Route::get('/users/registrations/{id}/participant',['as' => 'users.participants.add', 'uses' => 'ParticipantsController@add' ]);
    Route::get('/users/registrations/{id}/rp',['as' => 'users.rps.add', 'uses' => 'RpsController@add' ]);
    Route::resource('/users/participants', 'ParticipantsController');
    Route::resource('/users/rps', 'RpsController');
    Route::get('/users/roles',['as' => 'users.roles', 'uses' =>  'DashboardController@roles' ]);
    Route::post('/users/roles',['as' => 'users.roles.assign', 'uses' =>  'DashboardController@rolesassign' ]);

             