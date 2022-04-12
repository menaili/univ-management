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

//------------FACULTY---------------------------------------------------------------------------------------------

Route::get('/Add-faculty', [DepartementController::class, 'index'])->name('Add-faculty.index');

Route::post('/Add-faculty-sub', [DepartementController::class, 'addFaculty'])->name('faculty.sub');

//------------DOMAIN---------------------------------------------------------------------------------------------

Route::get('/Add-domain', [DepartementController::class, 'domain'])->name('Add-domain.index');

Route::post('/Add-domain-sub', [DepartementController::class, 'addDomain'])->name('domain.sub');

Route::get('/Add-domain', [DepartementController::class, 'getFacultyOfDomain'])->name('get.faculty.domain');

//------------DEVISION---------------------------------------------------------------------------------------------

//Route::get('/Add-devision', [DepartementController::class, 'devision'])->name('Add-devision.index');

Route::post('/Add-devision-sub', [DepartementController::class, 'addDevision'])->name('devision.sub');

Route::get('/Add-devision', [DepartementController::class, 'getFacultyOfDevision'])->name('get.faculty.devision');

Route::get('/getDomainOfDevision/{id}', [DepartementController::class, 'getDomainOfDevision'])->name('get.domain.devision');

//------------SPECIALITY---------------------------------------------------------------------------------------------

Route::post('/Add-speciality-sub', [DepartementController::class, 'addSpeciality'])->name('speciality.sub');

Route::get('/Add-speciality', [DepartementController::class, 'getFacultyOfSpeciality'])->name('get.faculty.speciality');

Route::get('/getDomainOfSpeciality/{id}', [DepartementController::class, 'getDomainOfSpeciality'])->name('get.domain.Speciality');

Route::get('/getDevisionOfSpeciality/{id}', [DepartementController::class, 'getDevisionOfSpeciality'])->name('get.devision.Speciality');






















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
