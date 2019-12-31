<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '', 'namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index');
    Route::post('/subscribe', 'HomeController@subscribe');
    Route::get('/{slug}.html', 'CategoryController@index');

});
Route::get('lang/{lang}', function($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});
