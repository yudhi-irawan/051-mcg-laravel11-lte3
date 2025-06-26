<?php

/*
	// Last Edited : 2025-06-25
	// File name   : web.php


	// MCG - Massive CRUD Generator Laravel-AdminLTE3-MySQL for Laravel 11 ver. May 2025-Free Version

	// Private message at Telegram        : @yudhi_irawan
	// Private activity feeds at Instagram: @iam.yudhi_irawan

	// Download Massive CRUD Generator on telegram and github link
	// MCG Application: https://t.me/MCGFreeVersion
	// Documentation  : https://yudhi-irawan.github.io/mcg-documentation/tutorial.html
	// Testing        : 
	// Template       : 

	// Donation and Support link
	// Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
	// Trakteer: https://trakteer.id/MassiveCrudGenerator

	// Please follow us for information about new releases


*/

// ---copy if not empty this BLOCK to .\routes\web.php
// ---from here!

// run development server with artisan
// c:\xampp\php\php.exe artisan serve --port=8000

// run browser with artisan
// http://localhost:8000/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ReportsController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/sex', [SexController::class, 'index']);
Route::post('/sex/getdata_one', [SexController::class, 'getdata_one'])->name('sex_getdata_one');
Route::get('/sex/get_from_parent_filter_one', [SexController::class, 'get_from_parent_filter_one'])->name('sex_get_from_parent_filter_one');
Route::post('/sex/savecreate_one', [SexController::class, 'savecreate_one'])->name('sex_savecreate_one');   //store
Route::get('/sex/edit_one', [SexController::class, 'edit_one'])->name('sex_edit_one');  //edit
Route::post('/sex/saveedit_one', [SexController::class, 'saveedit_one'])->name('sex_saveedit_one');   //update
Route::delete('/sex/delete_one', [SexController::class, 'delete_one'])->name('sex_delete_one'); //delete
Route::get('/sex/generatepdf_one', [SexController::class, 'generatepdf_one'])->name('sex_generatepdf_one');
Route::get('/sex/testing/{todo}', [SexController::class, 'testing']);

Route::get('/edu', [EduController::class, 'index']);
Route::post('/edu/getdata_one', [EduController::class, 'getdata_one'])->name('edu_getdata_one');
Route::get('/edu/get_from_parent_filter_one', [EduController::class, 'get_from_parent_filter_one'])->name('edu_get_from_parent_filter_one');
Route::post('/edu/savecreate_one', [EduController::class, 'savecreate_one'])->name('edu_savecreate_one');   //store
Route::get('/edu/edit_one', [EduController::class, 'edit_one'])->name('edu_edit_one');  //edit
Route::post('/edu/saveedit_one', [EduController::class, 'saveedit_one'])->name('edu_saveedit_one');   //update
Route::delete('/edu/delete_one', [EduController::class, 'delete_one'])->name('edu_delete_one'); //delete
Route::get('/edu/generatepdf_one', [EduController::class, 'generatepdf_one'])->name('edu_generatepdf_one');
Route::get('/edu/testing/{todo}', [EduController::class, 'testing']);

Route::get('/employee', [EmpController::class, 'index']);
Route::post('/emp/getdata_one', [EmpController::class, 'getdata_one'])->name('emp_getdata_one');
Route::get('/emp/get_from_parent_filter_one', [EmpController::class, 'get_from_parent_filter_one'])->name('emp_get_from_parent_filter_one');
Route::post('/emp/emp_savecreate_one', [EmpController::class, 'savecreate_one'])->name('emp_savecreate_one');   //store
Route::get('/employee-edit', [EmpController::class, 'edit_one'])->name('employee-edit');  //edit
Route::post('/emp/saveedit_one', [EmpController::class, 'saveedit_one'])->name('emp_saveedit_one');   //update
Route::delete('/employee-delete', [EmpController::class, 'delete_one'])->name('employee-delete');  //delete
Route::get('/emp/generatepdf_one', [EmpController::class, 'generatepdf_one'])->name('emp_generatepdf_one');
Route::get('/emp/testing/{todo}', [EmpController::class, 'testing']);


// ---to here!
