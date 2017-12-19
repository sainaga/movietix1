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

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/browse/events', 'ScreeningController@browse_events');
Route::post('/browse', 'ScreeningController@browse');
Route::post('/search/{query}', 'ScreeningController@search');

Route::get('/genre/browse/{id}', 'GenreController@index');
Route::get('/event/create', 'ScreeningController@create');
Route::post('/event/create', 'ScreeningController@store');
Route::get('/screening/{slug}', 'ScreeningController@show');
Route::get('/movie/{id}', 'ScreeningController@show_also');
Route::post('/screening/review/{slug}', 'ScreeningController@comment');

Route::get('/book/ticket/{slug}', 'TicketController@book');
Route::get('/complete/booking/{slug}', 'TicketController@store');
Route::post('/complete/booking/{slug}', 'TicketController@store');

Route::post('/account/update/profile', 'HomeController@updateprofile');
Route::get('/account/{username}/profile', 'HomeController@myprofile');
Route::get('/account/{username}/myevents', 'HomeController@myevents');
Route::get('/account/{username}/pastevents', 'HomeController@pastevents');
Route::get('/account/{username}/upcomingevents', 'HomeController@upcomingevents');
Route::get('/account/{username}/myprofile', 'HomeController@myprofile');
Route::get('/show/attendees/{slug}', 'HomeController@attendees');
Route::get('/show/upcomingattendees/{slug}', 'HomeController@upcomingattendees');
Route::get('/show/pastattendees/{slug}', 'HomeController@pastattendees');
//Route::get('/download/ticket/{slug}', 'HomeController@attendees');
Route::get('/download/ticket/{slug}',array('as'=>'attendees','uses'=>'HomeController@download_attendees'));
Route::get('/sendemail', 'HomeController@sendemail');

Route::group(['middleware' => 'check-permission:staff|admin|student'], function () {
	Route::get('/genre/create', 'GenreController@create');
	Route::post('/genre/store', 'GenreController@store');
	Route::get('/genre/{id}', 'GenreController@edit');
	Route::post('/genre/update/{id}', 'GenreController@update');
	Route::get('/language/create', 'LanguageController@create');
	Route::post('/language/store', 'LanguageController@store');
});

/////Auth Routes
//$this->get('login', 'Auth\LoginController@login');
Route::group(['middleware' => 'guest'], function () {
	Route::get('/', function () {
	    return view('home');
	});
	Route::get('/login', function () {
	    return view('auth.login');
	})->name('login');
	Route::get('/register', function () {
	    return view('auth.register');
	})->name('register');
});
//Route::group(['middleware' => 'auth'], function () {
	$this->post('login', 'Auth\LoginController@login');
	$this->post('/register', 'Auth\RegisterController@registeruser');
	$this->post('logout', 'Auth\LoginController@logout')->name('logout');
//});
// Registration Routes...
//$this->get('/register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
