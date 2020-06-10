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

Route::get('/', function () {
    return view('welcome');
})->name('startpagina');

Route::group(['middleware' => ['role:admin']], function (){
    Route::get('provinces/{province}/delete', 'ProvinceController@delete')
        ->name('provinces.delete');
    Route::resource('/provinces', 'ProvinceController');
    Route::get('cities/{city}/delete', 'CityController@delete')
        ->name('cities.delete');
    Route::resource('/cities', 'CityController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/province/{province}', 'ProvincePublicController@show')->name('provinceshow');
Route::get('/city/{city}', 'CityPublicController@show')->name('cityshow');

Route::get('/province', 'ProvincePublicController@index')->name('provincepublic');
Route::get('/city', 'CityPublicController@index')->name('citypublic');






