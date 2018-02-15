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
Auth::routes();
Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');
Route::get('manage/neighborhoods','ManageController@neighborhoods')->middleware('auth');
Route::get('manage/businesses','ManageController@businesses')->middleware('auth');
Route::get('manage/locations','ManageController@locations')->middleware('auth');
Route::get('manage/specialties','ManageController@specialties')->middleware('auth');
Route::get('manage/payment_option','ManageController@payment_option')->middleware('auth');
Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');

Route::post('manage/add-business','ManageController@add_business')->middleware('auth');
