<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectMockUpController;

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
    return view('welcome');
});

Route::get("/dashboard", DashboardController::class)->name("dashboard");
Route::resource('/customer', CustomerController::class);
Route::resource('/phase', PhaseController::class);
Route::resource('/project', ProjectController::class);
Route::get("/project/mockup/{project_id}", [ProjectMockUpController::class, "index"])->name("project.mockup.index");
Route::post("/project/mockup", [ProjectMockUpController::class, "upload"])->name("project.mockup.upload");
Route::delete("/project/mockup/{id}", [ProjectMockUpController::class, "delete"])->name("project.mockup.delete");
