<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/test-card', [HomeController::class,'testCard'])->name('test-card');
Route::post('/test-card/save', [HomeController::class,'testCardSave'])->name('test-card-save');


Route::group(['middleware'=>['auth']],function (){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/students', [StudentController::class,'index'])->name('student-list');
    Route::get('/add-student', [StudentController::class,'create'])->name('add-student');
    Route::get('/student-detail/{id}', [StudentController::class,'detail'])->name('student-detail');
    Route::post('/student-store', [StudentController::class,'store'])->name('student.store');

    Route::get('/courses', [CourseController::class,'index'])->name('course-list');
    Route::get('/add-course', [CourseController::class,'create'])->name('add-course');
    Route::post('/store', [CourseController::class,'store'])->name('course.store');

    Route::get('/add-course-student/{id}', [CourseController::class,'addStudent'])->name('add-course-student-view');
    Route::post('/add-course-student', [CourseController::class,'addStudentSave'])->name('add-course-student-save');

    Route::get('/course-detail/{id}', [CourseController::class,'detail'])->name('course-detail');

    // For payment
    Route::get('/buy-course/{id}', [StripePaymentController::class,'index'])->name('buy-course');
    Route::post('/confirm-course', [StripePaymentController::class,'confirmPayment'])->name('payment-store');

    /*Route::get('/paywithpaypal', [PayPalPaymentController::class,'payWithPaypal'])->name('paywithpaypal');
    Route::post('/paypal', [PayPalPaymentController::class,'postPaymentWithpaypal'])->name('paypal');
    Route::get('/paypal', [PayPalPaymentController::class,'getPaymentStatus'])->name('paypal-ststus');*/

    Route::get('handle-payment/{id}', [PayPalPaymentController::class,'handlePayment'])->name('make.payment');
    Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
    Route::get('payment-success', [PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');

});


require __DIR__.'/auth.php';
