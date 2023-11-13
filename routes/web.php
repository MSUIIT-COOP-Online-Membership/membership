<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\WebBookingController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('members', [App\Http\Controllers\MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [App\Http\Controllers\MemberController::class, 'create'])->name('members.create');
    Route::post('members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::resource('members', MemberController::class);

    Route::get('branches', [App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
    Route::get('branches/home', [App\Http\Controllers\BranchController::class, 'home'])->name('branches.home');
    Route::get('branches/create', [App\Http\Controllers\BranchController::class, 'create'])->name('branches.create');
    Route::post('branches', [App\Http\Controllers\BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
    Route::resource('branches', BranchController::class);

    Route::get('webinars', [App\Http\Controllers\WebinarController::class, 'index'])->name('webinars.index');
    Route::get('webinars/create', [App\Http\Controllers\WebinarController::class, 'create'])->name('webinars.create');
    Route::post('webinars', [App\Http\Controllers\WebinarController::class, 'store'])->name('webinars.store');
    Route::get('/webinars/{webinar}/edit', [WebinarController::class, 'edit'])->name('webinars.edit');
    Route::delete('/webinars/{webinar}', [WebinarController::class, 'destroy'])->name('webinars.destroy');
    Route::resource('webinars', WebinarController::class);

    Route::get('webbookings', [WebBookingController::class, 'index'])->name('webbookings.index');
    Route::get('webbookings/create', [WebBookingController::class, 'create'])->name('webbookings.create');
    Route::post('webbookings', [WebBookingController::class, 'store'])->name('webbookings.store');
    Route::get('/webbookings/{webbooking}/edit', [WebBookingController::class, 'edit'])->name('webbookings.edit');
    Route::put('/webbookings/{webbooking}', [WebBookingController::class, 'update'])->name('webbookings.update');
    Route::delete('/webbookings/{webbooking}', [WebBookingController::class, 'destroy'])->name('webbookings.destroy');
    Route::resource('webbookings', WebBookingController::class);

    Route::get('evaluations', [App\Http\Controllers\EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('evaluations/create', [App\Http\Controllers\EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('evaluations', [App\Http\Controllers\EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');
    Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
    Route::resource('evaluations', EvaluationController::class);

    Route::get('staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('staff', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::resource('staff', StaffController::class);

    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::resource('applications', ApplicationController::class);

    Route::get('/appointments/calendar', [AppointmentController::class, 'getAppointments'])->name('appointments.calendar');
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    Route::resource('appointments', AppointmentController::class);


    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    Route::resource('payments', PaymentController::class);
});
