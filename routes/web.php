<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

Route::resource('todos', ToDoController::class)->middleware('auth');