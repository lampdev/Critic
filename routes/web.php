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
// Auth
Route::Auth();
Route::get('/logout', function (){
	Auth::logout();
	return redirect('/login');
});
Route::get('/', function (){
	return redirect('/login');
});
// Manage View
Route::get('/manage/neighborhoods','ManageController@neighborhoods')->middleware('auth');
Route::get('/manage/businesses','ManageController@businesses')->middleware('auth');
Route::get('/manage/locations','ManageController@locations')->middleware('auth');
Route::get('/manage/specialties','ManageController@specialties')->middleware('auth');
Route::get('/manage/payment_option','ManageController@paymentOption')->middleware('auth');
// Adding data
Route::post('/manage/add-business','ManageController@addBusiness')->middleware('auth');

