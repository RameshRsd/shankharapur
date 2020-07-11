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
//    Route::get('rooms','HomeController@rooms');
    Route::get('room-details','HomeController@room_details');
    Route::get('about-us','HomeController@about_us');
//    Route::get('news','HomeController@news');
    Route::get('contact-us','HomeController@contact_us');

    Route::get('getRoom','HomeController@getRoom');

    Route::group(['prefix'=>'rooms','namespace'=>'room'],function (){
       Route::get('','RoomController@index');
       Route::get('{slug}','RoomController@view');
       Route::get('{slug}/{id}/book','RoomController@booking');
       Route::post('{slug}/{id}/book','RoomController@bookingStore');
    });

    Route::group(['prefix'=>'news','namespace'=>'news'],function (){
       Route::get('','NewsController@index');
    });
    Route::get('get_state','AjaxController@getState');
    Route::get('get_district','AjaxController@getDistrict');
    Route::get('get_city','AjaxController@getCity');
});
Route::group(['middleware'=>'guest'],function(){
    Route::get('login','frontend\\LoginController@getLogin')->name('login');
    Route::post('login','frontend\\LoginController@postLogin');
    Route::get('sign-up','frontend\\GuestController@create');
    Route::post('sign-up','frontend\\GuestController@store');
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
        Route::group(['prefix'=>'gallery-manage','namespace'=>'gallery'],function (){
            Route::get('','GalleryController@index');
            Route::group(['prefix'=>'images'],function (){
               Route::get('','ImageController@index');
               Route::post('','ImageController@store');
               Route::get('{id}/delete','ImageController@delete');
               Route::post('{id}/update','ImageController@update');
               Route::get('categories','CategoryController@index');
               Route::post('categories','CategoryController@store');
            });
            Route::group(['prefix'=>'sliders'],function (){
               Route::get('','SliderController@index');
               Route::post('','SliderController@store');
               Route::get('{id}/delete','SliderController@delete');
               Route::post('{id}/update','SliderController@update');
            });
            Route::group(['prefix'=>'categories'],function (){
               Route::get('','CategoryController@index');
               Route::post('','CategoryController@store');
               Route::get('{id}/delete','CategoryController@delete');
               Route::post('{id}/update','CategoryController@update');
            });
        });
        Route::group(['prefix'=>'work-flows','namespace'=>'work'],function (){
            Route::get('','WorkController@index');
            Route::group(['prefix'=>'room-book','namespace'=>'booking'],function (){
                Route::get('','RoomController@index');
                Route::get('add-new','RoomController@create');
                Route::post('add-new','RoomController@store');
                Route::get('{id}/remove','RoomController@remove');
                Route::get('{id}/edit','RoomController@edit');
                Route::post('{id}/edit','RoomController@update');
            });
            Route::group(['prefix'=>'room-check','namespace'=>'checking'],function (){
                Route::get('','RoomController@index');
                Route::get('add-new','RoomController@create');
                Route::post('add-new','RoomController@store');
                Route::get('{id}/remove','RoomController@remove');
                Route::get('{id}/continue','RoomController@continueCheck');
                Route::post('{id}/continue','RoomController@continueCheckStore');
                Route::get('{id}/checkout','RoomController@checkout');
            });
        });

        Route::group(['prefix'=>'guest-manage','namespace'=>'guest'],function (){
            Route::get('','GuestController@index');
            Route::get('guests','GuestController@guestList');
            Route::get('add-guest','GuestController@create');
            Route::post('add-guest','GuestController@store');
            Route::get('guests/{id}/edit','GuestController@edit');
            Route::post('guests/{id}/edit','GuestController@update');
        });

        Route::group(['prefix'=>'accommodations','namespace'=>'accommodation'],function (){
            Route::get('','AccommodationController@index');
            Route::get('accommodation-list','AccommodationController@getList');
            Route::get('add-accommodation','AccommodationController@create');
            Route::post('add-accommodation','AccommodationController@store');
            Route::get('accommodation-list/{id}/edit','AccommodationController@edit');
            Route::post('accommodation-list/{id}/edit','AccommodationController@update');
        });

        Route::group(['prefix'=>'room-manage','namespace'=>'rooms'],function (){
            Route::get('','RoomController@index');
            Route::get('room-list','RoomController@getList');
            Route::get('add-room','RoomController@create');
            Route::post('add-room','RoomController@store');
            Route::get('room-list/{id}/edit','RoomController@edit');
            Route::post('room-list/{id}/edit','RoomController@update');

            Route::get('room-features','RoomController@roomFeatures');
            Route::post('room-features','RoomController@roomFeaturesStore');
            Route::post('room-features/{id}/update','RoomController@roomFeaturesUpdate');

            Route::get('floors','RoomController@floors');
            Route::post('floors','RoomController@floorsStore');
            Route::post('floors/{id}/update','RoomController@floorsUpdate');
        });

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

        Route::group(['prefix'=>'rooms','namespace'=>'room_action'],function (){
            Route::get('{id}/book','RoomBookController@book');
            Route::post('{id}/book','RoomBookController@bookStore');
        });

        Route::get('get_state','AjaxController@getState');
        Route::get('get_district','AjaxController@getDistrict');
        Route::get('get_city','AjaxController@getCity');
    });

});
