<?php

use App\Http\Controllers\MainController;
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


// авторизация/регистрация подключаем модуль
Auth::routes();
//Route::get('/raspisanie', [\App\Http\Controllers\RaspisanieController::class, 'index'])->name('home')->middleware('auth');

// группа маршрутов доступных после регистрации
Route::group([
    'prefix' => 'auth',
], function () {
    // регистрируем сразу все маршруты из каждого контроллера
    Route::resource('raspisanie', \App\Http\Controllers\RaspisanieController::class);
    Route::resource('journal', \App\Http\Controllers\JournalController::class);
    Route::resource('plan', \App\Http\Controllers\PlanController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::resource('report', \App\Http\Controllers\ReportController::class);
    // скачиваем файлы из отчета
    Route::get('export', [\App\Http\Controllers\ReportController::class, 'export'])->name('export');

    Route::group([
        'prefix' => 'users',
    ], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            // проверка админ или нет
            Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        });
    });
});



// выйти из профиля
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('get-logout');

// главная страница
Route::get('/', [MainController::class, 'index'])->name('index');

