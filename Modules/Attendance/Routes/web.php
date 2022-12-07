<?php
use Modules\Attendance\Http\Controllers\AttendanceController;

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
Route::post('breakStart', 'AttendanceController@breakStart')->name('breakStart');
Route::post('breakEnd', 'AttendanceController@breakEnd')->name('breakEnd');
Route::get('view-attendance/{date}/{id}', ['as' => 'attendance.ViewAttendance', 'uses' => 'AttendanceController@ViewAttendance']);
Route::resource('/attendance', AttendanceController::class,['names' => 'attendance']);

