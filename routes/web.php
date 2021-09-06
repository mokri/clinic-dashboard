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

Route::get('/', 'HomeController@index');


/* doctors *******************************************/

//Route::get('/doctors', 'DoctorsController@index')->name('doctors');striha f la bas

Route::post('/doctor/edit-doctor/{name}/{email}','DoctorsController@update')->name('doctor.profile.update');
Route::get('/doctor/edit-doctor/{id}','DoctorsController@edit')->name('doctor.profile.edit');

Route::get('/doctor/profile','DoctorsController@index')->name('doctor.profile');


//Route::post('/doctors/add-doctors/store','DoctorsController@store')->name('doctors.store');


/*end doctors **************************************************/

/*patients *****************************************************/

Route::get('/patients', 'PatientsController@index')->name('patients');


Route::get('/patients/add-patients','PatientsController@create')->name('patients.add');

Route::get('/patients/{id}/edit-patient','PatientsController@edit')->name('patient.edit');

Route::post('/patients/update-patient/{id}','PatientsController@update')->name('patient.update');


Route::post('/patients/add-patient/store','PatientsController@store')->name('patients.store');

Route::get('/patients/{id}/delete-patient','PatientsController@destroy')->name('patient.delete');

Route::get('/patients/{id}/show-patient','PatientsController@show')->name('patient.show');




/*end patients************************************************************************************/
/*appointments************************************************************************************/

Route::get('/appointments','AppointmentController@index')->name('appointments');

Route::get('/appointments/add-appointment','AppointmentController@create')->name('appointment.add');
Route::get('/appointments/add-appointment/store','AppointmentController@store')->name('appointment.store');
Route::get('/appointments/delete-appointment/{id}','AppointmentController@destroy')->name('appointment.delete');


/* end appointments***********************************************************************************/

Route::get('/patients/add-diagnosis/{id}','DiagnosisController@store')->name('diagnosis.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

