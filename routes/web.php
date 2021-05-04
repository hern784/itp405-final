<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthBusinessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function () {
    return view('layouts.landing');
});


Route::get('/login', function () {
    return view('layouts.landing');
});

Route::get('/register', function () {
    return view('layouts.register');
});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get('/user/login', [AuthUserController::class, 'index'])->name('auth_user.index');
Route::post('/user/login', [AuthUserController::class, 'login'])->name('auth_user.login');

Route::get('/user/register', [AuthUserController::class, 'index'])->name('auth_user.index');
Route::post('/user/register', [AuthUserController::class, 'register'])->name('auth_user.register');

Route::post('/user/logout', [AuthUserController::class, 'logout'])->name('auth_user.logout');

Route::get('/user/profile', [UserController::class, 'index'])->name('user.profile');

Route::get('/user/appointments', [UserController::class, 'appointments'])->name('user.appointments');
Route::get('/user/appointments/make', [UserController::class, 'create_app'])->name('user.create_app');
Route::post('/user/appointments/make', [UserController::class, 'store_app'])->name('user.store_app');

Route::get('/user/comments', [UserController::class, 'comments'])->name('user.comments');
Route::get('/user/comments/make', [UserController::class, 'create_com'])->name('user.create_com');
Route::post('/user/comments/make', [UserController::class, 'store_com'])->name('user.store_com');


/*
|--------------------------------------------------------------------------
| BUSINESSES
|--------------------------------------------------------------------------
*/

Route::get('/business/login', [AuthBusinessController::class, 'index'])->name('auth_business.index');
Route::post('/business/login', [AuthBusinessController::class, 'login'])->name('auth_business.login');

Route::get('/business/register', [AuthBusinessController::class, 'index'])->name('auth_business.index');
Route::post('/business/register', [AuthBusinessController::class, 'register'])->name('auth_business.register');

Route::post('/logout', [AuthBusinessController::class, 'logout'])->name('aut_business.logout');

Route::get('/business/profile', [BusinessController::class, 'index'])->name('business.profile');
Route::get('/business/appointments', [BusinessController::class, 'appointments'])->name('business.appointments');
Route::get('/business/comments', [BusinessController::class, 'comments'])->name('business.comments');

Route::get('/business/capacity', [BusinessController::class, 'update_capacity'])->name('business.update_capacity');

Route::get('/search', [BusinessController::class, 'search'])->name('business.search');
Route::get('/favorite', [BusinessController::class, 'favorite'])->name('business.favorite');

/*
|--------------------------------------------------------------------------
| APPOINTMENTS
|--------------------------------------------------------------------------
*/
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/create/{business}', [AppointmentController::class, 'create'])->name('appointment.create');
Route::post('/appointment/store/{business}', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/appointment/edit/{app}', [AppointmentController::class, 'edit'])->name('appointment.edit');
Route::post('/appointment/update/{app}', [AppointmentController::class, 'update'])->name('appointment.update');
Route::get('/appointment/delete/{app}', [AppointmentController::class, 'delete'])->name('appointment.delete');

/*
|--------------------------------------------------------------------------
| COMMENTS
|--------------------------------------------------------------------------
*/
Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');
Route::get('/comment/create/{business}', [CommentController::class, 'create'])->name('comment.create');
Route::post('/comment/store/{business}', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/edit/{com}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/update/{com}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete/{com}', [CommentController::class, 'delete'])->name('comment.delete');

Route::get('/about', function () {
    return view('layouts.about');
})->name('about');
