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
Route::namespace('front')->group(function(){
    
    Route::get('/','HomePageController@index' )->name('front.homepage');
    Route::get('/category/{id}','CourseController@cat' )->name('front.cat');
    Route::get('/category/{id}/course/{cid}','CourseController@show' )->name('front.show');
    Route::get('/contact','ContactController@index' )->name('contact.show');

    Route::post('message/newsletter','MessageController@newsletter' )->name('front.message.newsletter');
    Route::post('message/contact','MessageController@contact' )->name('front.message.contact');
});
Route::namespace('Admin')->prefix('Dashboard')->group(function(){
    Route::get('/login','AuthController@login' )->name('Admin.login');
    Route::post('/handel','AuthController@handelLogin' )->name('Admin.handelLogin');
  
    Route::middleware('adminAuth:admin')->group(function(){
        Route::get('/','HomeController@index' )->name('Admin.home');
        Route::get('/logout','AuthController@logout' )->name('Admin.logout');
//-------------------------categories-------------------------
        Route::get('/trainers','CategoryController@index')->name('Admin.cats.index');
        Route::get('/cats/create','CategoryController@create')->name('Admin.cats.create');
        Route::post('/cats/store','CategoryController@store')->name('Admin.cats.store');
        Route::get('/cats/edit/{id}','CategoryController@edit')->name('Admin.cats.edit');
        Route::post('/cats/update','CategoryController@update')->name('Admin.cats.update');
        Route::get('/cats/delete/{id}','CategoryController@delete')->name('Admin.cats.delete');

        //--------------------trairners-----------------------
        Route::get('/trainers','TrainerController@index')->name('Admin.trainers.index');
        Route::get('/trainers/create','TrainerController@create')->name('Admin.trainers.create');
        Route::post('/trainers/store','TrainerController@store')->name('Admin.trairners.store');
        Route::get('/trainers/edit/{id}','TrainerController@edit')->name('Admin.trairners.edit');
        Route::post('/trainers/update','TrainerController@update')->name('Admin.trairners.update');
        Route::get('/trainers/delete/{id}','TrainerController@delete')->name('Admin.trainers.delete');
    });




});
