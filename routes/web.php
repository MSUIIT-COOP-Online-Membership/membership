<?php

use Illuminate\Support\Facades\Route;
use App\Models\Members;

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

Route::get('/', function () { return view('welcome'); });
Route::get('/code', [App\Http\Controllers\MembershipForm::class, 'index'])->name('forms.code');
Route::post('/code', [App\Http\Controllers\MembershipForm::class, 'code'])->name('forms.code');
Route::get('/get-sub-type-options', [App\Http\Controllers\MembershipForm::class, 'getSubTypeOptions'])->name('forms.get-sub-type-options');
Route::post('/membership/edit/{id}', [App\Http\Controllers\MembershipForm::class, 'edit'])->name('forms.membership.edit');
Route::get('/view/{id}', [App\Http\Controllers\MembershipForm::class, 'view'])->name('forms.view');
Route::get('/pdf_view/{id}', [App\Http\Controllers\MembershipForm::class, 'viewPDF'])->name('forms.pdf_view');
Route::get('/pdf_download/pdf_view/{id}/generate', [App\Http\Controllers\MembershipForm::class, 'generatePDF'])->name('forms.pdf_download.generatePDF');

Route::post('/get-emp_others/{emp_type}', [App\Http\Controllers\MembershipForm::class, 'getEmp_others'])->name('forms.membership.get-emp_others');

Route::get('/bookappointment/{id}', [App\Http\Controllers\AppointmentController::class, 'bookappointment'])->name('forms.bookappointment');
Route::post('/bookappointment', [App\Http\Controllers\AppointmentController::class, 'addappointment'])->name('forms.bookappointment');