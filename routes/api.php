<?php

use App\Http\Controllers\AchivementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\PlanController;

Route::get('/achievements', [AchivementController::class, 'index']);
Route::post('/achievements', [AchivementController::class, 'store']);
Route::get('/achievements/{id}', [AchivementController::class, 'show']);
Route::put('/achievements/{id}', [AchivementController::class, 'update']);
Route::delete('/achievements/{id}', [AchivementController::class, 'destroy']);

Route::get('/violations', [ViolationController::class, 'index']);
Route::post('/violations', [ViolationController::class, 'store']);
Route::get('/violations/{id}', [ViolationController::class, 'show']);
Route::put('/violations/{id}', [ViolationController::class, 'update']);
Route::delete('/violations/{id}', [ViolationController::class, 'destroy']);

Route::get('/plans', [PlanController::class, 'index']);
Route::post('/plans', [PlanController::class, 'store']);
Route::get('/plans/{id}', [PlanController::class, 'show']);
Route::put('/plans/{id}', [PlanController::class, 'update']);
Route::delete('/plans/{id}', [PlanController::class, 'destroy']);

use App\Http\Controllers\GradeStudentController;
use App\Http\Controllers\GradeScheduleController;
use App\Http\Controllers\GradeTagController;
use App\Http\Controllers\GradeController;

Route::get('/grade-students', [GradeStudentController::class, 'index']);
Route::post('/grade-students', [GradeStudentController::class, 'store']);
Route::get('/grade-students/{id}', [GradeStudentController::class, 'show']);
Route::put('/grade-students/{id}', [GradeStudentController::class, 'update']);
Route::delete('/grade-students/{id}', [GradeStudentController::class, 'destroy']);

Route::get('/grade-schedules', [GradeScheduleController::class, 'index']);
Route::post('/grade-schedules', [GradeScheduleController::class, 'store']);
Route::get('/grade-schedules/{id}', [GradeScheduleController::class, 'show']);
Route::put('/grade-schedules/{id}', [GradeScheduleController::class, 'update']);
Route::delete('/grade-schedules/{id}', [GradeScheduleController::class, 'destroy']);

Route::get('/grade-tags', [GradeTagController::class, 'index']);
Route::post('/grade-tags', [GradeTagController::class, 'store']);
Route::get('/grade-tags/{id}', [GradeTagController::class, 'show']);
Route::put('/grade-tags/{id}', [GradeTagController::class, 'update']);
Route::delete('/grade-tags/{id}', [GradeTagController::class, 'destroy']);

Route::get('/grades', [GradeController::class, 'index']);
Route::post('/grades', [GradeController::class, 'store']);
Route::get('/grades/{id}', [GradeController::class, 'show']);
Route::put('/grades/{id}', [GradeController::class, 'update']);
Route::delete('/grades/{id}', [GradeController::class, 'destroy']);


