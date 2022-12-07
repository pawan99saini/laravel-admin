<?php
use Modules\Matrix\Http\Controllers\MatrixController;

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
Route::middleware('auth')->group(function () {
Route::post('update-course', 'MatrixController@updateCourse')->name('update-course');
Route::resource('matrix', MatrixController::class,['names' => 'matrix']);
});