<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

Route::resource('plans', PlanController::class);
