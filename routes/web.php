<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'SiteController@home');
Route::get('/company', 'SiteController@company');
Route::get('/careers', 'SiteController@careers');
Route::get('/blog', 'SiteController@blog');
Route::get('blog/{post}', 'SiteController@show')->name('blog.show');
Route::get('/contact', 'SiteController@contact');
Route::get('/db_doc_collection', 'SiteController@db_doc_collection');
Route::get('/debt_recovery', 'SiteController@debt_recovery');
Route::get('/customer_verification', 'SiteController@customer_verification');
Route::get('/e_kyc', 'SiteController@e_kyc');
Route::get('/video_kyc', 'SiteController@video_kyc');
Route::get('/e_sign', 'SiteController@e_sign');
Route::get('/aadhar_masking', 'SiteController@aadhar_masking');
Route::get('/db_fmatch', 'SiteController@db_fmatch');
Route::get('/e_nach_e_mandate', 'SiteController@e_nach_e_mandate');
Route::get('/offline_aadhar', 'SiteController@offline_aadhar');
Route::get('/multitenant', 'SiteController@multitenant');


Route::post('/forms/application', 'FormsController@application');
Route::post('/forms/brouchure_req1', 'FormsController@brouchure_req1');
Route::post('/forms/brouchure_req2', 'FormsController@brouchure_req2');
Route::post('/forms/brouchure_req3', 'FormsController@brouchure_req3');
Route::post('/forms/fc_reg', 'FormsController@fc_reg');
Route::post('/forms/client_reg', 'FormsController@client_reg');
Route::post('/forms/agency_reg', 'FormsController@agency_reg');
Route::post('/forms/contactus', 'FormsController@contactus');
Route::post('/forms/enquiry', 'FormsController@enquiry');


//Auth::routes();

Auth::routes([

  'register' => false, // Register Routes...

  'reset' => false, // Reset Password Routes...

  'confirm' => false, // Email Verification Routes...

  'email' => false

]);

//this already uses middleware
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts', 'PostController@store')->name('posts.store');
    Route::get('posts', 'PostController@index')->name('posts.index');
    Route::get('posts/{post}', 'PostController@show')->name('posts.show');
    Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('posts/{post}', 'PostController@update')->name('posts.update');
    Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');

  });
