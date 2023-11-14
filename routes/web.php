<?php

use App\Http\Controllers\Panel\AboutUsController;
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\ForgotPasswordController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\GalleryController;
use App\Http\Controllers\Panel\MenuController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\ReservationController;
use App\Http\Controllers\Panel\ServiceController;
use App\Http\Controllers\Panel\ContactFormController;
use App\Http\Controllers\Panel\SiteSettingsController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Site\FrontendController;
use Illuminate\Support\Facades\Route;


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
//auth routes

Route::middleware('guest')->group(function (){
    Route::get('login',[AuthController::class,'showLogin'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login.post');

    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
// dashboard main page route
    Route::get('/',DashboardController::class)->name('home');
// profile route
    Route::get('profile',[ProfileController::class,'showProfile'])->name('profile');
    Route::post('profile/change-profile',[ProfileController::class,'changeProfile'])->name('change-profile');
    Route::post('profile/change-password',[ProfileController::class,'changePassword'])->name('change-password');
// reservation route
    Route::resource('reservation',ReservationController::class)->except('store');
// category route
    Route::resource('category',CategoryController::class);
    Route::post('category/reorder',[CategoryController::class,'reOrder'])->name('category.reorder');
//Menu route
    Route::resource('menu',MenuController::class);
//about-us route
    Route::resource('about-us',AboutUsController::class)->only(['index','update']);
//service route
    Route::resource('service',ServiceController::class);
//slider route
    Route::resource('slider',SliderController::class);
    Route::post('slider/reorder',[SliderController::class,'reOrder'])->name('slider.reorder');
//gallery route
    Route::resource('gallery',GalleryController::class);
    Route::post('gallery/reorder',[GalleryController::class,'reOrder'])->name('gallery.reorder');

//comment route
    Route::resource('comment',CommentController::class);
// contact form
    Route::get('contact-form',[ContactFormController::class,'index'])->name('contact.index');
    Route::get('contact-form/show/{contact_form}',[ContactFormController::class,'show'])->name('contact.show');
    Route::delete('contact-form/{contact_form}',[ContactFormController::class,'destroy'])->name('contact.destroy');
// settings route
    Route::get('settings',[SiteSettingsController::class,'siteSettings'])->name('settings.index');
    Route::post('settings',[SiteSettingsController::class,'updateSiteSettings'])->name('settings.update');
//logout
Route::post('logout',[AuthController::class,'logout'])->name('logout');
});

///////////////////////////////////////////////////////////////////////////////////

// Frontend Routes

Route::get('/',[FrontendController::class,'home'])->name('home-page');
Route::get('/hakkimizda',[FrontendController::class,'aboutUs'])->name('about-us');
Route::get('/menu',[FrontendController::class,'menu'])->name('menu');
Route::get('/menu/{category}',[FrontendController::class,'category'])->name('menu.category');
Route::get('/menu/{category}/{meal}',[FrontendController::class,'meal'])->name('menu.detail');
Route::get('/hizmetler',[FrontendController::class,'service'])->name('service');
Route::get('/rezervasyon',[FrontendController::class,'showReservation'])->name('reservation');
Route::post('/rezervasyon',[FrontendController::class,'reservation'])->name('reservation.store');
Route::get('/iletisim',[FrontendController::class,'contact'])->name('contactForm');
Route::post('iletisim',[FrontendController::class,'contactForm'])->name('contactForm.post');
