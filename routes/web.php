<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SendRequestController;
use App\Http\Controllers\DepartementController;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/about-me',function () {

    return view('about');
})->name("about");

Route::view('contact-me','contact',[
    'Page_name'=> 'Contact us',
    'page_des'=> 'hello evry one am haroun errachide'
])->name("contact");



Route::get('/Send-request', [SendRequestController::class, 'index'])->name('send-request.index');

Route::post('/Send-request-sub', [SendRequestController::class, 'addRequest'])->name('request.sub');

Route::get('/Send-request', [SendRequestController::class, 'getLevelFaculty'])->name('get.faculty');

Route::get('/Requests', [RequestController::class, 'getAllRequests'])->name('get.requests');

Route::get('/Requests-status', [RequestController::class, 'getAllRequestsStatus'])->name('get.status');

Route::get('/Status-update/{id}', [RequestController::class, 'changeStatus'])->name('update.status');

Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getById'])->name('edit.requests');

Route::get('/Requests-update', [SendRequestController::class, 'updateById'])->name('update.requests');

Route::get('/Requests-delete/{id}', [RequestController::class, 'deleteById'])->name('delete.requests');

Route::get('/Login', [LoginController::class, 'index'])->name('login.index');

Route::post('/Login', [LoginController::class, 'login_submit'])->name('login.submit');

Route::get('/Add-faculty', [DepartementController::class, 'index'])->name('send-request.index');

Route::post('/Add-faculty-sub', [DepartementController::class, 'addFaculty'])->name('faculty.sub');




























Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
