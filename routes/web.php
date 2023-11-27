<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ThemaController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [ClassController::class, 'homepage'])->name("home");
Route::get('/classes', [ClassController::class, 'classes'])->name("classes");

Route::get('/login', [RegisterController::class, 'tlogin'])->middleware("guest")->name("login");

Route::get('/teacher/register', [RegisterController::class, 'tcreate'])->middleware("guest");
Route::post('/teacher/register', [RegisterController::class, 'tstore']) -> name("tregister");

Route::get('/courses', [CourseController::class, 'courses'])->name("courses");
Route::post('/courses', [CourseController::class, 'createCourse']);

Route::get('/student/register', [RegisterController::class, 'screate']) ->middleware("guest");
Route::post('/student/register', [RegisterController::class, 'sstore']) -> name("sregister");
Route::post('/student/register/checkcode', [RegisterController::class, 'checkCode']);

Route::post('/login', [RegisterController::class, 'login']) -> name("login");
Route::post('/classes', [ClassController::class, 'createClass']) -> name("cclass");

Route::get('/classes/{classcode}', [ClassController::class, 'class']);
Route::get('/courses/{course_id}', [CourseController::class, 'course']);

Route::get('/themas/{thema_id}', [ThemaController::class, 'index']);
Route::get('/themas/{thema_id}/new-task', [TaskController::class, 'newTask']);

Route::post('/courses/{classcode}', [CourseController::class, 'createThema']);
Route::post('/courses/{course_id}/setthemaaccess', [CourseController::class, 'setThemaAccess']);
Route::post('/classes/{classcode}/changecourse', [ClassController::class, 'changeCourse']);

Route::get('/test', [ClassController::class, 'test']);

// Route::get('/classes/{classcode}', function (string $ccode) {
//     $class = DB::table('classrooms')->where('code', '=', $ccode)->first();
//     $students = DB::table('students')->where('classcode', '=', $ccode)->get();

//     $classTitle = $class->title;

//     return view('classes.class', ["ccode" => $ccode, "ctitle" => $classTitle, "students" => $students]);
// });