<?php

use App\Http\Controllers\Email\CertificateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Email\SeminarController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Seminar Email
Route::get('/seminar-mail-sent', [SeminarController::class,'seminarEmail'])->name('seminarEmail');

//With Certificate Email
Route::get('/certificate-mail-sent', [CertificateController::class,'certificateEmail'])->name('certificateEmail');