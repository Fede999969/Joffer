<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/jobs", [JobController::class, "list"]);

Route::get("/job/{id}", [JobController::class, "view"]);

Route::get("/job/create", [JobController::class, "create"]);

Route::get("/job/edit/{id}", [JobController::class, "edit"]);

Route::get("/job/delete/{id}", [JobController::class, "delete"]);

