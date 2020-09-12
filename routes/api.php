<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['api']], function(){
    Route::apiResource('/posts', 'Api\PostController');
});

Route::get('/tasks', 'Api\TaskController@index');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


