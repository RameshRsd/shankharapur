<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'frontend'],function (){
    Route::get('','HomeController@index');
});
Route::group(['middleware'=>'guest'],function(){
    Route::get('login','frontend\\LoginController@getLogin')->name('login');
    Route::post('login','frontend\\LoginController@postLogin');
});
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace'=>'backend'],function(){


    Route::group(['middleware'=>'admin','prefix'=>'admin','namespace'=>'admin'],function(){
        Route::get('','DashboardController@index');

        Route::group(['prefix'=>'profile-manage','namespace'=>'profile'],function (){
            Route::get('','ProfileController@index');
            Route::get('edit-profile','ProfileController@edit');
            Route::post('edit-profile','ProfileController@update');
            Route::post('changePassword','ProfileController@changePassword');
            Route::post('updatePhoto','ProfileController@updatePhoto');
        });
        Route::get('guests','GuestController@index');

        Route::group(['prefix'=>'location-manage','namespace'=>'location'],function (){
            Route::get('','LocationController@index');
            Route::get('countries','CountryController@index');
            Route::post('countries','CountryController@store');
            Route::post('countries/{id}/update','CountryController@update');
        });

    });

});
