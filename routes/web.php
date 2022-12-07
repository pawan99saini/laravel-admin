<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return redirect('index');
// });



// Documentations pages

Route::middleware('auth')->group(function () {
    Route::get('/', [PagesController::class, 'index']);
    Route::get('my-profile/{id}', [PagesController::class, 'myProfile'])->name('my-profile');
    Route::post('update-profile/{id}', [PagesController::class, 'updateProfile'])->name('update-profile');

});

Route::resource('users', UsersController::class);
require __DIR__.'/auth.php';
