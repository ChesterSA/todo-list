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

Route::get('/', function () {
    return redirect(route('tasks.index'));
});

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::post('{task}/complete', 'TaskController@complete')->name('complete');
});
Route::resource('tasks', 'TaskController')->only([
    'index', 'store', 'update'
]);
