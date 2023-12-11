<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\WebBookingController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\FatherController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\SpouseController;
use App\Http\Controllers\ToDoListController;



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
Route::resource('todo-items', ToDoListController::class);

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('users', UserController::class);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('members', [App\Http\Controllers\MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [App\Http\Controllers\MemberController::class, 'create'])->name('members.create');
    Route::post('members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');
    Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
    Route::resource('members', MemberController::class);

    Route::get('branches', [\App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
    Route::get('branches/create', [App\Http\Controllers\BranchController::class, 'create'])->name('branches.create');
    Route::post('branches', [App\Http\Controllers\BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
    Route::resource('branches', BranchController::class);

    Route::get('webinars', [\App\Http\Controllers\WebinarController::class, 'index'])->name('webinars.index');
    Route::get('webinars/create', [App\Http\Controllers\WebinarController::class, 'create'])->name('webinars.create');
    Route::post('webinars', [App\Http\Controllers\WebinarController::class, 'store'])->name('webinars.store');
    Route::get('/webinars/{webinar}/edit', [WebinarController::class, 'edit'])->name('webinars.edit');
    Route::delete('/webinars/{webinar}', [WebinarController::class, 'destroy'])->name('webinars.destroy');
    Route::get('/webinars/dates/{webinar}', [WebinarController::class, 'getDates']);
    Route::get('/webinars/times/{webinar}/{date}', [WebinarController::class, 'getTimes']);
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
    //Route::get('/appointments/calendar', [AppointmentController::class, 'getAppCard'])->name('appointments.calendar');
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

    Route::get('beneficiaries', [\App\Http\Controllers\BeneficiaryController::class, 'index'])->name('beneficiaries.index');
    Route::get('beneficiaries/create', [App\Http\Controllers\BeneficiaryController::class, 'create'])->name('beneficiaries.create');
    Route::post('beneficiaries', [App\Http\Controllers\BeneficiaryController::class, 'store'])->name('beneficiaries.store');
    Route::get('/beneficiaries/{beneficiary}/edit', [BeneficiaryController::class, 'edit'])->name('beneficiaries.edit');
    Route::delete('/beneficiaries/{beneficiary}', [BeneficiaryController::class, 'destroy'])->name('beneficiaries.destroy');
    Route::resource('beneficiaries', BeneficiaryController::class);

    Route::get('businesses', [\App\Http\Controllers\BusinessController::class, 'index'])->name('businesses.index');
    Route::get('businesses/create', [App\Http\Controllers\BusinessController::class, 'create'])->name('businesses.create');
    Route::post('businesses', [App\Http\Controllers\BusinessController::class, 'store'])->name('businesses.store');
    Route::get('/businesses/{business}/edit', [BusinessController::class, 'edit'])->name('businesses.edit');
    Route::delete('/businesses/{business}', [BusinessController::class, 'destroy'])->name('businesses.destroy');
    Route::resource('businesses', BusinessController::class);

    Route::get('children', [\App\Http\Controllers\ChildController::class, 'index'])->name('children.index');
    Route::get('children/create', [App\Http\Controllers\ChildController::class, 'create'])->name('children.create');
    Route::post('children', [App\Http\Controllers\ChildController::class, 'store'])->name('children.store');
    Route::get('/children/{child}/edit', [ChildController::class, 'edit'])->name('children.edit');
    Route::delete('/children/{child}', [ChildController::class, 'destroy'])->name('children.destroy');
    Route::resource('children', ChildController::class);

    Route::get('emergencies', [\App\Http\Controllers\EmergencyController::class, 'index'])->name('emergencies.index');
    Route::get('emergencies/create', [App\Http\Controllers\EmergencyController::class, 'create'])->name('emergencies.create');
    Route::post('emergencies', [App\Http\Controllers\EmergencyController::class, 'store'])->name('emergencies.store');
    Route::get('/emergencies/{emergency}/edit', [EmergencyController::class, 'edit'])->name('emergencies.edit');
    Route::delete('/emergencies/{emergency}', [EmergencyController::class, 'destroy'])->name('emergencies.destroy');
    Route::resource('emergencies', EmergencyController::class);

    Route::get('employers', [\App\Http\Controllers\EmployerController::class, 'index'])->name('employers.index');
    Route::get('employers/create', [App\Http\Controllers\EmployerController::class, 'create'])->name('employers.create');
    Route::post('employers', [App\Http\Controllers\EmployerController::class, 'store'])->name('employers.store');
    Route::get('/employers/{employer}/edit', [EmployerController::class, 'edit'])->name('employers.edit');
    Route::delete('/employers/{employer}', [EmployerController::class, 'destroy'])->name('employers.destroy');
    Route::resource('employers', EmployerController::class);

    Route::get('employments', [\App\Http\Controllers\EmploymentController::class, 'index'])->name('employments.index');
    Route::get('employments/create', [App\Http\Controllers\EmploymentController::class, 'create'])->name('employments.create');
    Route::post('employments', [App\Http\Controllers\EmploymentController::class, 'store'])->name('employments.store');
    Route::get('/employments/{employment}/edit', [EmploymentController::class, 'edit'])->name('employments.edit');
    Route::delete('/employments/{employment}', [EmploymentController::class, 'destroy'])->name('employments.destroy');
    Route::resource('employments', EmploymentController::class);

    Route::get('fathers', [\App\Http\Controllers\FatherController::class, 'index'])->name('fathers.index');
    Route::get('fathers/create', [App\Http\Controllers\FatherController::class, 'create'])->name('fathers.create');
    Route::post('fathers', [App\Http\Controllers\FatherController::class, 'store'])->name('fathers.store');
    Route::get('/fathers/{father}/edit', [FatherController::class, 'edit'])->name('fathers.edit');
    Route::delete('/fathers/{father}', [FatherController::class, 'destroy'])->name('fathers.destroy');
    Route::resource('fathers', FatherController::class);

    Route::get('mothers', [\App\Http\Controllers\MotherController::class, 'index'])->name('mothers.index');
    Route::get('mothers/create', [App\Http\Controllers\MotherController::class, 'create'])->name('mothers.create');
    Route::post('mothers', [App\Http\Controllers\MotherController::class, 'store'])->name('mothers.store');
    Route::get('/mothers/{mother}/edit', [MotherController::class, 'edit'])->name('mothers.edit');
    Route::delete('/mothers/{mother}', [MotherController::class, 'destroy'])->name('mothers.destroy');
    Route::resource('mothers', MotherController::class);

    Route::get('houses', [\App\Http\Controllers\HouseController::class, 'index'])->name('houses.index');
    Route::get('houses/create', [App\Http\Controllers\HouseController::class, 'create'])->name('houses.create');
    Route::post('houses', [App\Http\Controllers\HouseController::class, 'store'])->name('houses.store');
    Route::get('/houses/{house}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::delete('/houses/{house}', [HouseController::class, 'destroy'])->name('houses.destroy');
    Route::resource('houses', HouseController::class);

    Route::get('spouses', [\App\Http\Controllers\SpouseController::class, 'index'])->name('spouses.index');
    Route::get('spouses/create', [App\Http\Controllers\SpouseController::class, 'create'])->name('spouses.create');
    Route::post('spouses', [App\Http\Controllers\SpouseController::class, 'store'])->name('spouses.store');
    Route::get('/spouses/{spouse}/edit', [SpouseController::class, 'edit'])->name('spouses.edit');
    Route::delete('/spouses/{spouse}', [SpouseController::class, 'destroy'])->name('spouses.destroy');
    Route::resource('spouses', SpouseController::class);
});
