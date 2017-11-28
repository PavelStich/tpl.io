<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/', 'TemplateController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {
    Route::resource('template', 'TemplateController');
    Route::resource('bunch', 'BunchController');
    Route::resource('campaign', 'CampaignController');
    /*Route::resource('subscriber', 'SubscriberController');*/
    /*Route::prefix('bunch/{bunch_id}')->group(function () {
        Route::resource('subscriber', 'SubscriberController');   });
    Route::group(['prefix' => 'bunch/{bunch_id}'], function(){
        Route::resource('subscriber', 'SubscriberController');   });*/
    Route::group(['prefix' => 'bunches/{bunch_id}/', 'as' => 'bunches::'], function () {
        Route::resource('subscribers', 'SubscriberController');
    });
    Route::get('/campaign/{campaign}/send', 'CampaignController@send');
    Route::get('/campaign/{campaign}/preview', 'CampaignController@preview');

});