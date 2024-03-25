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
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TreatmentController;
 
Route::get('/users/{id}/edit', [ClientController::class, 'edit'])->name('users.edit');
Route::post('/users/{id}/toggle-status', [ClientController::class, 'toggleStatus'])->name('users.toggleStatus');

//Route::get('/get-client', [ScheduleController::class, 'getClient']);
//login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/_login', [LoginController::class, '_login']);

//email
Route::get('get_OTP', [SendEmailController::class, 'showSendEmail'])->name('get_OTP');
Route::put('get_OTP', [SendEmailController::class, 'get_OTP']);

//send otp
Route::get('verifikasi_email', [OtpEmailController::class, 'showSendotp'])->name('verifikasi_email');
Route::put('verifikasi_email', [OtpEmailController::class, 'verifikasi_email']);

//forgot password
Route::get('forgot_password', [ForgotPasswordController::class, 'showSendForgot'])->name('forgot_password');
Route::put('forgot_password', [ForgotPasswordController::class, 'forgot_password']);
Route::get('/change_password', function () {
    return view('auth/change_password');
});

//set new password
Route::get('set_new_password', [SetNewPasswordController::class, 'showSendSetNew'])->name('set_new_password');
Route::put('set_new_password', [SetNewPasswordController::class, 'set_new_password']);

//register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/dashboard', 'App\Http\Controllers\Dashboard@index')->name('dashboard');

//TREATMENT
Route::get('get_list_treatment', [TreatmentController::class, 'get_list_treatment']);

//MASTER
Route::get('get_list_role', [MasterController::class, 'get_list_role']);
Route::get('get_list_workingType', [MasterController::class, 'get_list_workingType']);
Route::get('get_list_freqType', [MasterController::class, 'get_list_freqType']);

//get list worker schedule  form
//Route::get('/search-data', 'ScheduleController@searchData');
Route::get('/search-data', [ScheduleController::class, 'searchData'])->name('searchData');

Route::get('/Account', function () {
    return view('module/account/index');
});

Route::get('/detail-profile', function () {
    return view('module/account/v_detailProfile');
});

    Route::get('/Master', function () {
        return view('module/master/index');
    });
     
    //Schedule
    Route::get('/get_listSchedule', function () {
        return view('module/schedule/index');
    })->name('get_list_worker');
    Route::post('addSchedule', [ScheduleController::class, 'addSchedule']);
    Route::get('get_listSchedule', [ScheduleController::class, 'get_listSchedule']);
    Route::get('/fetch-data', 'ScheduleController@fetchData')->name('fetch.data');

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
    
//get list worker
Route::get('/get_list_worker', function () {
    return view('module/account/worker');
})->name('get_list_worker');
Route::get('get_list_worker', [WorkerController::class, 'get_list_worker']);
Route::get('/details/{id}', 'WorkerController@showDetails')->name('details.show');

Route::put('/details/{id}', 'WorkerController@update')->name('details.update');
Route::get('/items/{id}', 'WorkerController@show')->name('items.show');
Route::get('/get-list-worker/{id}', [WorkerController::class, 'show'])->name('get-list-worker');

//post detail worker 
Route::get('/add-detail-worker', function () {
    return view('module/account/v_Addworker');
})->name('add-detail-worker');
Route::post('insert-detail-worker', [WorkerController::class, 'addDetailworker']);
    
//get list Client
Route::get('/get_list_client', function () {
    return view('module/account/client');
})->name('get_list_client');
Route::get('get_list_client', [ClientController::class, 'get_list_client']);

//POSTClient
Route::get('/add-detail-client', function () {
    return view('module/account/v_Addclient');
})->name('add-detail-client');
Route::post('insert-detail-client', [ClientController::class, 'addDetailclient']);
Route::get('/get-client/{email}/edit', [ClientController::class, 'edit']);
//Route::get('/get-client/{email}', [ClientController::class, 'edit'])->name('get-client');
Route::get('/show-detail-client/{email}', [ClientController::class, 'show'])->name('show-detail-client');