<?php

use App\Models\Extracurricular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\studentcontroller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\extracurricularController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', function () {
    return view('home',[
        'name' =>'Muhammad Rifki Fahrezi', 
        'role' => 'admin',
        'buah' =>['pisang','apel', 'jeruk', 'semangka', 'kiwi']
    ]);
});

Route :: get('/student',[studentcontroller::class, 'index']);
Route :: get('/students/{id}',[studentcontroller::class, 'show']);
Route :: get('/student-add',[studentcontroller::class, 'create']);
Route :: post('/student',[studentcontroller::class, 'store']);
Route :: get('/student-edit/{id}',[studentcontroller::class, 'edit']);
Route :: put('student/{id}',[studentcontroller::class, 'update']);
Route :: get('/student-delete/{id}', [StudentController::class, 'delete']);
Route :: delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore']);


Route :: get('/class',[ClassController::class, 'index']);
Route :: get('/class-detail/{id}',[Classcontroller::class, 'show']);
Route :: get('/class-add',[ClassController::class, 'create']);
Route :: post('/class', [ClassController::class, 'store']);
Route :: get('/class-edit/{id}',[ClassController::class, 'edit']);
Route :: put('/class/{id}', [ClassController::class, 'update']);
Route :: get('/class-delete/{id}', [ClassController::class, 'delete']);
Route :: delete('/class-destroy/{id}', [ClassController::class, 'destroy']);
Route::get('/class-deleted', [ClassController::class, 'deletedStudent']);
Route::get('/class/{id}/restore', [ClassController::class, 'restore']);

Route :: get('/extracurricular',[ExtracurricularController::class, 'index']);
Route :: get('/extracurricular-detail/{id}',[ExtracurricularController::class, 'show']);
Route :: get('/extracurricular-add',[ExtracurricularController::class, 'create']);
Route :: post('/extracurricular', [ExtracurricularController::class, 'store']);
Route :: get('/extracurricular-edit/{id}',[ExtracurricularController::class, 'edit']);
Route :: put('/extracurricular/{id}', [ExtracurricularController::class, 'update']);
Route :: get('/extracurricular-delete/{id}', [ExtracurricularController::class, 'delete']);
Route :: delete('/extracurricular-destroy/{id}', [ExtracurricularController::class, 'destroy']);
Route::get('/extracurricular-deleted', [ExtracurricularController::class, 'deletedStudent']);
Route::get('/extracurricular/{id}/restore', [ExtracurricularController::class, 'restore']);


Route :: get('/teacher',[TeacherController::class, 'index']);  
Route :: get('/teacher-detail/{id}',[TeacherController::class, 'show']);  
Route :: get('/teacher-add',[TeacherController::class, 'create']);
Route :: post('/teacher',[TeacherController::class, 'store']);  
Route :: get('/teacher-edit/{id}',[TeacherController::class, 'edit']);
Route :: put('/teacher/{id}', [TeacherController::class, 'update']);
Route::get('/teacher-delete/{id}', [TeacherController::class, 'delete']);
Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy']);
Route::get('/teacher-deleted', [TeacherController::class, 'deletedStudent']);
Route::get('/teacher/{id}/restore', [TeacherController::class, 'restore']);
