<?php


Route::get('/', function () {
    return view('welcome');
    });

Auth::routes();
Route::post('/login/custom', [
					'uses' => 'Auth\LoginController@login',
					'as' => 'login.custom'
    ]);

	Route::get('/home',function(){
	   return view('home');
	})->name('home');

Route::prefix('teacher')->group(function () {
	Route::get('/teacher',function(){
		return view('teacher');
	})->name('teacher');
	Route::get('/teacherBooking/index','TeacherController@index')->name('teacherinsertbooking');
	Route::post('/teacherBooking/store','TeacherController@store')->name('teacherbooking');
	Route::get('teacher/teacherEvents','TeacherController@teacherEvents')->name('teacherEvents');
});

Route::prefix('admin')->group(function () {
	Route::get('/dashboard',function(){
	   return view('dashboard');
	})->name('dashboard');
	Route::get('/events/index','BookingController@index')->name('calindex');
	Route::get('/events/create','BookingController@create')->name('create');
	Route::post('/events/store','BookingController@store')->name('store');
	Route::any('/eventController/showAll','BookingController@showAll')->name('showAll');
	Route::post('/events/{id}/update','BookingController@update')->name('update');
	Route::get('/events/{id}/destroy','BookingController@destroy')->name('destroy');
	Route::get('/events/{id}/show','BookingController@show')->name('show');
	Route::get('/events/{id}/edit','BookingController@edit')->name('edit');
	Route::get('/eventController/showSchoolClubBooking','BookingController@showSchoolClubBooking')->name('schoolClubBookingRec');
	Route::get('/eventController/{id}/editPayment','BookingController@editPayment')->name('editSchoolClubBooking');
	Route::post('/eventController/{id}/updatePayment','BookingController@updatePayment')->name('updateSchoolClubBooking');
	Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));
	Route::get('registerationForm',array('as'=>'registerationForm','uses'=>'ItemController@registerationForm'));
});
Route::middleware('auth')->group(function () {
    //if(Auth::check() && Auth::user()->is_admin()=='user'){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::any('/eventController/showAllUserBooking','UserController@showAllUserBooking')->name('showAllUserBooking');
	Route::get('viewTimeslot','UserController@getChildReview')->name('viewTimeslot');
	Route::get('/timeslot/getTimeslot','UserController@getTimeslot')->name('timeslot');
	Route::post('/timeslot/postTimeslot','UserController@storeTimeslot')->name('storeTimeslot');
	Route::post('/insertschoolclub/{id}/store','UserController@store')->name('schoolclubbooking');
	Route::get('/userController/clubBookingdates','UserController@clubBookingdates')->name('clubBookingdates');
	Route::get('/insertAdhocApp','UserController@showAdhocApp')->name('insertAdhocApp');
	Route::post('/insertAdhocApp/storeAdhocApp','UserController@storeAdhocApp')->name('storeAdhocApp');
	Route::get('/home/usereventcal','UserController@userEventsCal')->name('usereventcal');
	Route::get('/notificationForm','UserController@notificationForm')->name('notificationForm');
	Route::post('/notificationForm/storeNotification','UserController@storeNotification')->name('storeNotification');
	Route::get('/userController/{id}/showUser','UserController@showUser')->name('showuser');
	Route::get('/userController/{id}/showclubsessionbookingform','UserController@showclubsessionbookingform')->name('showclubsessionbookingform');
	Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));
	Route::get('registerationForm',array('as'=>'registerationForm','uses'=>'ItemController@registerationForm'));
	//}
});

