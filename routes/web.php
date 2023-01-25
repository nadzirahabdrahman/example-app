<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;
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

// GET: page yg takda user input
// POST: untuk yg ada user input shj

Route::get('/', function () {
    return view('home');
})->middleware('auth');


//name(): parameter kena sama dgn route name in Authenticate file. 
//'guest'->dlm file Kernel, nak check dah login atau belum
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');

// middleware utk elak user logout tp belum login (not logic)
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');





//middleware untuk LOGIN AUTHENTICATION: must login first
//auth->refer to file Kernel
Route::get('/students', [StudentController::class, 'index'])->middleware('auth');

//untuk view ONE student based on ID
Route::get('/student/{id}', [StudentController::class, 'show'])
->middleware(['auth','admin-or-teacher']);

//untuk ADD DATA page
Route::get('/student-add', [StudentController::class, 'create'])
->middleware(['auth','admin-or-teacher']);

//untuk SAVE BUTTON direct ke page STUDENT
Route::post('/student', [StudentController::class, 'store'])
->middleware(['auth','admin-or-teacher']);

//untuk EDIT data
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])
->middleware(['auth','admin-or-teacher']);

//untuk UPDATE data
Route::put('/student/{id}', [StudentController::class, 'update'])
->middleware(['auth','admin-or-teacher']);

//untuk DELETE data
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])
->middleware(['auth','admin']);

Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])
->middleware(['auth','admin']);

//untuk show deleted data
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])
->middleware(['auth','admin']);

//untuk restore deleted data
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])
->middleware(['auth','admin']);




Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show'])->middleware('auth');

//utk button ADD NEW CLASS
Route::get('/class-add', [ClassController::class, 'create']);

//utk SEND DATA BARU KE DB & SAVE BUTTON
Route::post('/class', [ClassController::class, 'store']);

//untuk EDIT data
Route::get('/class-edit/{id}', [ClassController::class, 'edit']);

//untuk UPDATE data
Route::put('/class/{id}', [ClassController::class, 'update']);

//untuk DELETE data
Route::get('/class-delete/{id}', [ClassController::class, 'delete']);

Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy']);


//Shortcut-> type 'Routeclo' as in closure
// Route::get('users/{id}', function ($id) {
    
// });

Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular-detail/{id}', [ExtracurricularController::class, 'show'])
->middleware('auth');

//utk button ADD NEW EXTRACURRICULAR
Route::get('/extracurricular-add', [ExtracurricularController::class, 'create']);

//utk SEND DATA BARU KE DB & SAVE BUTTON
Route::post('/extracurricular', [ExtracurricularController::class, 'store']);

//untuk EDIT data
Route::get('/extracurricular-edit/{id}', [ExtracurricularController::class, 'edit']);

//untuk UPDATE data
Route::put('/extracurricular/{id}', [ExtracurricularController::class, 'update']);

//untuk DELETE data
Route::get('/extracurricular-delete/{id}', [ExtracurricularController::class, 'delete']);

Route::delete('/extracurricular-destroy/{id}', [ExtracurricularController::class, 'destroy']);





Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher-detail/{id}', [TeacherController::class, 'show'])->middleware('auth');

//utk button ADD NEW TEACHER
Route::get('/teacher-add', [TeacherController::class, 'create']);

//utk SEND DATA BARU KE DB & SAVE BUTTON
Route::post('/teacher', [TeacherController::class, 'store']);

//untuk EDIT data
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit']);

//untuk UPDATE data
Route::put('/teacher/{id}', [TeacherController::class, 'update']);
