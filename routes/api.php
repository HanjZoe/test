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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::group(['namespace' => 'Like', 'prefix'=>'{post}/Alikes'], function (){
        Route::post('/','StoreController')->name('post.Alike.store');
    });
});
Route::group(['namespace' => 'Vue', 'prefix' => 'vue'], function(){
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::group(['namespace' => 'User','prefix' => 'users'],function (){
            Route::get('/','IndexController@index')->name('vue.admin.user.index');
            Route::delete('/{user}','DeleteController')->name('vue.admin.user.delete');
            Route::patch('/{user}','UpdateController')->name('vue.admin.user.update');
        });
    });
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::group(['namespace' => 'Category','prefix' => 'category'],function (){
            Route::get('/','IndexController')->name('vue.admin.category.index');
            Route::delete('/{category}','DeleteController')->name('vue.admin.category.delete');
            Route::patch('/{category}','UpdateController')->name('vue.admin.category.update');
        });
    });
});
