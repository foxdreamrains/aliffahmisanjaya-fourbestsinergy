<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_UserAdmin;
use App\Http\Controllers\C_NpwpAdmin;
use App\Http\Controllers\Auth\LoginController;

//FITUR CLEAR
Route::get('/clear', function() {
    $exitcode = Artisan::call('optimize:clear');
    return 'DONE';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [C_SorakSorai::class, 'soraksorai'])->name('soraksorai')->withoutMiddleware('auth');

Auth::routes();


Route::get('CMS', [LoginController::class, 'showLoginForm'])->name('showLoginForm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('CMS/dashboard', [C_UserAdmin::class, 'dashboard'])->name('dashboard')->middleware('auth');

// # user
Route::get('CMS/user', [C_UserAdmin::class, 'user'])->name('cmsuser')->middleware('auth');
Route::get('CMS/user/add', [C_UserAdmin::class, 'useradd'])->name('cmsuserAdd')->middleware('auth');
Route::post('CMS/user/store', [C_UserAdmin::class, 'userstore'])->name('cmsuserStore')->middleware('auth');
Route::get('CMS/user/edit/{id}', [C_UserAdmin::class, 'useredit'])->name('cmsuserEdit')->middleware('auth');
Route::post('CMS/user/update', [C_UserAdmin::class, 'userupdate'])->name('cmsuserUpdate')->middleware('auth');
Route::get('CMS/user/delete/{id}', [C_UserAdmin::class, 'userdelete'])->name('cmsuserDelete')->middleware('auth');

Route::get('CMS/download/npwp', [C_NpwpAdmin::class, 'npwp'])->name('cmsnpwp')->middleware('auth');
Route::get('/cms/npwp/download/{id_file}', [C_NpwpAdmin::class, 'downloadCombinedFiles'])->name('cmsnpwpDownloadStore');
