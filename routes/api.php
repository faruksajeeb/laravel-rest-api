<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;

Route::ApiResource('/student_classes',StudentClassController::class);