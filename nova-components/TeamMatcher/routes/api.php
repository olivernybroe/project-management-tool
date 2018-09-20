<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Olivernybroe\TeamMatcher\TeamMatcherController;


/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. You're free to add
| as many additional routes to this file as your tool may require.
|
*/

 Route::get('test', function (Request $request) {
     return 'works';
 });

Route::get('/matches/{projectId}', 'Olivernybroe\TeamMatcher\TeamMatcherController@match');