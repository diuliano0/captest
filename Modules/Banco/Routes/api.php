<?php

use Illuminate\Http\Request;

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

/*\Route::middleware('auth:api')->get('/banco', function (Request $request) {
    return $request->user();
});*/
Route::group(['prefix'=>'v1'], function () {
    //Route::group(["prefix" => "admin/banco", "middleware" => ["auth:api"], "namespace" => "Api\Admin"], function () {
    Route::group(["prefix" => "admin/banco", "namespace" => "Api\Admin"], function () {
        Route::get('conta', [
            'as' => 'banco.conta.index',
            'uses' => 'ContaController@index'
        ]);
        Route::post('conta/saque/{contaId}', [
            'as' => 'banco.conta.deposito',
            'uses' => 'ContaController@saque'
        ]);
        Route::post('conta/deposito/{contaId}', [
            'as' => 'banco.conta.deposito',
            'uses' => 'ContaController@deposito'
        ]);
    });

});
