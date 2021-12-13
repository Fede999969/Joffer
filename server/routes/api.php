<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/jobs", [JobController::class, "list"]);

Route::get("/jobs/{id}", [JobController::class, "view"]);

Route::post("/jobs/create", [JobController::class, "create"]);

Route::put("/jobs/edit/{id}", [JobController::class, "edit"]);

Route::delete("/jobs/delete/{id}", [JobController::class, "delete"]);

