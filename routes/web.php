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

Route::group(['middleware' => 'auth'], function(){

    Route::get('/mypage', 'MypageController@index')->name('mypage');

    Route::resource('plans', 'PlansController');

    // Route::get('plans', 'PlanController@list')->name('plans.index');
    // Route::get('plans/create', 'PlanController@create')->name('plans.create');
    // Route::post('plans', 'PlanController@store')->name('plans.store');
    // Route::get('plans/{plan}', 'PlanController@show')->name('plans.show');
    // Route::get('plans/{plan}/edit', 'PlanController@edit')->name('plans.edit');
    // Route::put('plans/{plan}', 'PlanController@update')->name('plans.update');
    // Route::delete('plans/{plan}', 'PlanController@destroy')->name('plans.destroy');

    // Route::get('/plans/create', 'PlanController@create')->name('plans.create');
    // Route::post('/plans/create', 'PlanController@store');
    // Route::get('/mypage/plans/{p_id}/edit', 'PlanController@showEditForm')->name('plans.edit');
    // Route::post('/mypage/plans/{p_id}/edit', 'PlanController@edit');
    // Route::get('/plans', 'PlanController@index')->name('plans.index');
    // Route::get('/plans/{p_id}', 'PlanController@showPlan')->name('plan');
});

Auth::routes();


