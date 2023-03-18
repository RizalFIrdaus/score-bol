<?php

use App\Http\Controllers\ClassementController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
// Login Google
// Route::get('/auth/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('google.redirect');
// Route::get('/auth/callback',  [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get("/club", [ClubController::class, "index"])->middleware("auth")->name("club");
Route::post("/club", [ClubController::class, "store"])->middleware("auth")->name("store.club");
Route::get("/match", [MatchController::class, "index"])->middleware("auth")->name("match");
Route::post("/match", [MatchController::class, "store"])->middleware("auth")->name("store.match");
Route::get("/classement", [ClassementController::class, "index"])->name("classement");
Route::post("/clear", [ClassementController::class, "clear"])->middleware("auth")->name("clear");








// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['verified']);
// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/');
// })->middleware(['auth', 'signed'])->name('verification.verify');
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
