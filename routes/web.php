<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grades\GradeController;

Auth::routes();

Route::group(['middleware'=>['guest' ,'auth']],function(){

    Route::get('/', function () {
        return view('auth.login');
    });

});



//------------------------------------------------------------------------------------------------
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        // الصفحة الرئيسية
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('grades', 'GradeController');

});
//--------------------------------------------------------------------------------------------------


