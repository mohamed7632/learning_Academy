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
    
    Route::get('/home','HomePageController@index' )->name('front.homepage');
    Route::get('/category/{id}','CourseController@cat' )->name('front.cat');
    Route::get('/category/{id}/course/{cid}','CourseController@show' )->name('front.show');
    Route::get('/contact','ContactController@index' )->name('contact.show');

    
    Route::prefix('message')->group(function(){

        Route::post('/newsletter','MessageController@newsletter' )->name('front.message.newsletter');
        Route::post('/contact','MessageController@contact' )->name('front.message.contact');
        Route::Post('/enroll' , 'MessageController@enroll');

    });
});
Route::namespace('Admin')->prefix('Dashboard')->group(function(){
    Route::get('/login','AuthController@login' )->name('Admin.login');
    Route::post('/handel','AuthController@handelLogin' )->name('Admin.handelLogin');
  
    Route::middleware('adminAuth:admin')->group(function(){
        Route::get('/','HomeController@index' )->name('Admin.home');
        Route::get('/logout','AuthController@logout' )->name('Admin.logout');
//-------------------------categories-------------------------
        Route::get('/cats','CategoryController@index')->name('Admin.cats.index');
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

        //--------------------courses--------------------------
        Route::get('/courses','CoursesController@index')->name('Admin.courses.index');
        Route::get('/courses/create','CoursesController@create')->name('Admin.courses.create');
        Route::post('/courses/store','CoursesController@store')->name('Admin.courses.store');
        Route::get('/courses/edit/{id}','CoursesController@edit')->name('Admin.courses.edit');
        Route::post('/courses/update','CoursesController@update')->name('Admin.courses.update');
        Route::get('/courses/delete/{id}','CoursesController@delete')->name('Admin.courses.delete');
        //----------------------students-----------------------------
        Route::get('/students','StudentController@index')->name('Admin.students.index');
        Route::get('/students/create','StudentController@create')->name('Admin.students.create');
        Route::post('/students/store','StudentController@store')->name('Admin.students.store');
        Route::get('/students/edit/{id}','StudentController@edit')->name('Admin.students.edit');
        Route::post('/students/update','StudentController@update')->name('Admin.students.update');
        Route::get('/students/delete/{id}','StudentController@delete')->name('Admin.students.delete');
        Route::get('/students/showcourses/{id}','StudentController@showCourses')->name('Admin.students.showCourses');
        Route::get('/students/{id}/course/{c_id}/approve','StudentController@approveCourse')->name('Admin.students.approveCourse');
        Route::get('/students/{id}/course/{c_id}/reject','StudentController@rejectCourse')->name('Admin.students.rejectCourse');
        Route::get('/students/{id}/add-to-course','StudentController@addToCourse')->name('Admin.students.addToCourse');
        Route::post('/students/{id}/storeCourse','StudentController@storeCourse')->name('Admin.students.storeCourse');

    });




});
