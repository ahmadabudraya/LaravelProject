<?php
use App\User;
use App\skills;

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/abs',function(){
	$skills = DB::table('skills')->where('user_id',1)->get();
	return dd($skills);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/******   To Store data   *******/

Route::post('/profile/{id}','mainInfoController@store');

/********  To show data *********/

Route::get('/profile/{id}','mainInfoController@show');

/******** To Edit Data ********/

Route::get('/profile/{id}/edit','mainInfoController@edit');


/******* To update data *******/

Route::patch('/profile/{id}','mainInfoController@update');

