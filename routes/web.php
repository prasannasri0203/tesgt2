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

//register page
// Route::view('/', 'registration');
// Route::get('/', function () { return view(''); });
//insert into register 
Route::post('/insert','RegistrationController@store');
//main page
Route::get('/','RegistrationController@mainPage')->name('/');
//login page
Route::get('/login','LoginController@login')->name('login');
//registration page
Route::get('/registration','RegistrationController@registration')->name('registration');
//login 
Route::post('/doLogin','LoginController@doLogin')->name('doLogin');
//forgetpassword
Route::get('/forgetPassword','LoginController@forgetPassword')->name('forgetPassword');
// changePassword
Route::post('/changePassword','LoginController@changePassword')->name('changePassword');

//logout
Route::get('/logout','LoginController@logout')->name('logout');
//documentVerification
Route::post('/profile/notifyCallback','RegistrationController@getResponse');
//privacy policy
Route::get('/privacyPolicy','LoginController@privacyPolicy')->name('privacyPolicy');
//contents
Route::get('/contents','RegistrationController@contents');
//failure msg
Route::get('/failureContentMsg','RegistrationController@failureContentMsg');
//success msg
Route::get('/successContentMsg','RegistrationController@successContentMsg');
    
//verify the session value
Route::group(['middleware' => ['verify']], function () {
    //insert data
    Route::post('/add','DashboardController@store')->name('add');
    //dashboard page
    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');

    Route::get('/sucessMsg','DashboardController@successMessage')->name('sucessMsg'); 
});

//cronjob
Route::get('/getApplicantData','CronjobController@fetchApplicantData');
//cronjob for registration
Route::get('/deleteRegistration','CronjobController@deleteRegistration');
//access token
// Route::get('/accessToken','RegistrationController@accessToken');
//delete records shiftpro
Route::get('/deleteShuftiproRecord','RegistrationController@deleteShuftiproRecord');
