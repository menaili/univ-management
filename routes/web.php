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

//-----------------------------Veterinary------------------------------------------------------------

Route::get('/Send-request', [SendRequestController::class, 'index'])->name('send-request.index');

Route::post('/Send-request-sub', [SendRequestController::class, 'addRequest'])->name('request.sub');

Route::get('/Send-request', [SendRequestController::class, 'getLevelFaculty'])->name('get.faculty');

Route::get('/Status-update/{id}', [RequestController::class, 'changeStatus'])->name('update.status');

Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getById'])->name('edit.requests');

Route::get('/Requests-update', [SendRequestController::class, 'updateById'])->name('update.requests');

Route::get('/Requests-delete/{id}', [RequestController::class, 'deleteById'])->name('delete.requests');

//-----------------------------Licence------------------------------------------------------------

Route::get('/Send-request-licence', [SendRequestController::class, 'indexLicence'])->name('send-request.indexLicence');

Route::post('/Send-request-sub-licence', [SendRequestController::class, 'addRequestLicence'])->name('request.sub.licence');

Route::get('/Send-request-licence', [SendRequestController::class, 'getlicenceFaculty'])->name('get.faculty.licence');

Route::get('/Requests-edit/{id}', [SendRequestController::class, 'getByIdLicence'])->name('edit.requests.licence');

Route::get('/Requests-update-licence', [SendRequestController::class, 'updateByIdLicence'])->name('update.requests.licence');

Route::get('/Requests-delete-licence/{id}', [RequestController::class, 'deleteByIdLicence'])->name('delete.requests.licence');

Route::get('/getDomainOfBachlor/{id}', [SendRequestController::class, 'getDomainOfBachlor'])->name('get.domain.bachlor');

Route::get('/getDevisionOfBachlor/{id}', [SendRequestController::class, 'getDevisionOfBachlor'])->name('get.devision.bachlor');

Route::get('/getSpecialityOfBachlor/{id}', [SendRequestController::class, 'getSpecialityOfBachlor'])->name('get.speciality.bachlor');

Route::get('/Request-licence', [\App\Http\Controllers\RequestLevelController::class, 'getAllBachlorRequests'])->name('get.request.bachlor');

//-----------------------------Master------------------------------------------------------------

Route::get('/Requests', [RequestController::class, 'getAllRequests'])->name('get.requests');

Route::get('/Requests-status', [RequestController::class, 'getAllRequestsStatus'])->name('get.status');



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
