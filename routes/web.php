<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WondeController;

Route::get('/wonde/test/', [WondeController::class, 'index'])->name('wonde_page');
Route::get('/wonde/test/students/className', [WondeController::class, 'showStudenst'])->name('wondeStudentList_page');
