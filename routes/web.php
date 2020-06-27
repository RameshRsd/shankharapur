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

            Route::get('states','StateController@index');
            Route::post('states','StateController@store');
            Route::post('states/{id}/update','StateController@update');

            Route::get('districts','DistrictController@index');
            Route::post('districts','DistrictController@store');
            Route::get('districts/{id}/edit','DistrictController@edit');
            Route::post('districts/{id}/edit','DistrictController@update');

            Route::get('cities','CityController@index');
            Route::post('cities','CityController@store');
            Route::get('cities/{id}/edit','CityController@edit');
            Route::post('cities/{id}/edit','CityController@update');

        });

        Route::get('get_state','AjaxController@getState');
        Route::get('get_district','AjaxController@getDistrict');
        Route::get('get_city','AjaxController@getCity');
    });

});
