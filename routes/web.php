<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OtpEmailController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SetNewPasswordController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ClientController;
 
//login

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

//worker
Route::get('post_detail_worker', [WorkerController::class, 'showWorkerForm'])->name('post_detail_worker');
Route::post('post_detail_worker', [WorkerController::class, 'post_detail_worker']);

//get detail Client
Route::get('/get-detail-client', [ClientController::class, 'get_detail_client']);

//Client
//Route::get('/post_detail_client', [ClientController::class, 'post_detail_client']);
//Route::get('post_detail_client', [ClientController::class, 'ShowDetailClientForm'])->name('post_detail_client');
Route::post('post_detail_client', [ClientController::class, 'post_detail_client']);

//email
Route::get('get_OTP', [SendEmailController::class, 'showSendEmail'])->name('get_OTP');
Route::put('get_OTP', [SendEmailController::class, 'get_OTP']);

//send otp
Route::get('verifikasi_email', [OtpEmailController::class, 'showSendotp'])->name('verifikasi_email');
Route::put('verifikasi_email', [OtpEmailController::class, 'verifikasi_email']);

//forgot password
Route::get('forgot_password', [ForgotPasswordController::class, 'showSendForgot'])->name('forgot_password');
Route::put('forgot_password', [ForgotPasswordController::class, 'forgot_password']);

//set new password
Route::get('set_new_password', [SetNewPasswordController::class, 'showSendSetNew'])->name('set_new_password');
Route::put('set_new_password', [SetNewPasswordController::class, 'set_new_password']);

//register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/Master', function () {
    return view('module/master/index');
});

Route::get('/Schedule', function () {
    return view('module/schedule/index');
});

Route::get('/Complain', function () {
    return view('module/complain/index');
});

Route::get('/Service', function () {
    return view('module/service/treatment/index'); 
});

Route::get('/Article', function () {
    return view('module/master/v_article');
});

Route::get('/a', function () {
    return view('module/master/v_customer');
});

Route::get('/Account', function () {
    return view('module/account/index');
});