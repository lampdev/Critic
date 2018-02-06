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
Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');
Route::get('admin/profile', function () {
    //
})->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});
