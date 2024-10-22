<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Auth;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('admin.auth.login');});

Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login.submit');
    Route::get('/password/reset', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::post('/logout', [Auth\LoginController::class,'logout'])->name('logout');

        Route::resource('roles', Admin\RoleController::class);
        Route::resource('admins', Admin\AdminController::class);

        Route::resource('forms', Admin\FormController::class);
        Route::resource('forms.form-fields', Admin\FormFieldController::class);

        Route::post('rlcos/index-ajax', [ Admin\RlcoController::class,'indexAjax'])->name('rlcos.index-ajax');
        Route::get('rlcos/{rlco}/sectors-mapping', [Admin\RlcoController::class, 'sectors_mapping'])->name('rlocs.sectors-mapping');
        Route::put('rlcos/{rlco}/sectors-mapping', [Admin\RlcoController::class, 'update_sectors_mapping'])->name('rlcos.sectors-mapping.update');
        Route::resource('rlcos', Admin\RlcoController::class);

        Route::resource('rlcos.account-info', Admin\AccountInfoController::class);


        Route::post('auditable/index-ajax', [ Admin\AuditableController::class,'indexAjax'])->name('auditable.index-ajax');
        Route::resource('auditable', Admin\AuditableController::class);

        Route::get('dashboard', [ Admin\DashboardController::class,'index'])->name('dashboard');

        Route::post('activities/index-ajax', [ Admin\ActivityController::class,'indexAjax'])->name('activities.index-ajax');
        Route::resource('activities', Admin\ActivityController::class);

        Route::post('reviews/index-ajax', [ Admin\ReviewController::class,'indexAjax'])->name('reviews.index-ajax');
        Route::resource('reviews', Admin\ReviewController::class);

        Route::post('required-documents/index-ajax', [ Admin\RequiredDocumentController::class,'indexAjax'])->name('required-documents.index-ajax');
        Route::resource('required-documents', Admin\RequiredDocumentController::class);
    });
