<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\Auth\NewPasswordController;
use App\Http\Controllers\Web\Auth\PasswordController;
use App\Http\Controllers\Web\Auth\PasswordResetLinkController;
use App\Http\Controllers\Web\Auth\RegisteredUserController;
use App\Http\Controllers\Web\NavigationController;
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

Route::as('web.')->group(function () {
    Route::middleware('guest')->as('auth.')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::controller(NavigationController::class)->as('starter.')->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('job-detail/{slug}', 'jobDetail')->name('job.detail');
        Route::post('apply-job', 'applyJob')->name('job.apply');
        Route::get('/about', 'about')->name('about');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/faq/{slug}', 'faqSingle')->name('faq.single');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/terms', 'term')->name('term');
        Route::get('/privacy', 'privacy')->name('privacy');
        Route::post('add-to-wish-list', 'addToWishList')->name('wishlist.add');
    });

    Route::middleware(['auth'])->group(function () {
        Route::as('freelancers.')->middleware(['freelancers'])->prefix('f')->namespace("App\Http\Controllers\Web\Freelancers")->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');

            Route::controller(ChatController::class)->as('chat.')->group(function() {
                Route::get('chat/{activeJob_id}', 'index')->name('index');
                Route::post('chat/message', 'SendMessage')->name('message.send');
            });

            Route::controller(ProfileManagementController::class)->as('profile.')->group(function () {
                Route::get('my-profile', 'index')->name('index');
                Route::post('update-profile', 'updateProfile')->name('update');
            });

            Route::controller(ManageJobController::class)->as('managejob.')->group(function () {
                Route::get('applied-job', 'appliedJobIndex')->name('appliedJob.index');
                Route::get('wishlisted-job', 'wishListedJobIndex')->name('wishlistedJob.index');
                Route::get('active-job', 'activeJobIndex')->name('activeJob.index');
                Route::post('active-job/end', 'activeJobEnd')->name('activeJob.end');
                Route::post('active-job/submit-rating', 'submitRating')->name('activeJob.submit-rating');
            });
        });

        Route::as('employers.')->middleware(['employers'])->prefix('e')->namespace("App\Http\Controllers\Web\Employers")->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');

            Route::controller(ProfileManagementController::class)->as('profile.')->group(function() {
                Route::get('company-profile', 'index')->name('index');
                Route::post('update-profile', 'updateProfile')->name('update');
            });

            Route::controller(ChatController::class)->as('chat.')->group(function () {
                Route::get('chat/{activeJob_id}', 'index')->name('index');
                Route::post('chat/message', 'SendMessage')->name('message.send');
            });

            Route::controller(ManageJobController::class)->as('managejob.')->group(function() {
                Route::get('post-job', 'postJobIndex')->name('post-job.index');
                Route::post('post-job', 'postJob')->name('post-job.store');
                Route::get('manage-job', 'manageJobIndex')->name('manage-job.index');
                Route::get('manage-job/{slug}/applications', 'applicationsIndex')->name('manage-job.applications');
                Route::post('manage-job/applications', 'applicationsUpdate')->name('manage-job.applications.update');
                Route::put('manage-job/{slug}', 'manageJobUpdate')->name('manage-job.update');
                Route::delete('manage-job/{slug}', 'manageJobDestroy')->name('manage-job.destroy');
                Route::get('active-job', 'activeJobIndex')->name('activeJob.index');
                Route::post('active-job/end', 'activeJobEnd')->name('activeJob.end');
                Route::post('active-job/submit-rating', 'submitRating')->name('activeJob.submit-rating');
            });
        });

        Route::get('mark-as-read', [ProfileController::class, 'markAsRead'])->name('notification.markAsRead');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::as('admin.')->prefix('admin')->group(function () {
    Route::middleware('guest')->controller(App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class)->as('auth.')->group(function () {
        Route::get('login', 'create')->name('login');
        Route::post('login', 'store')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::namespace("App\Http\Controllers\Admin")->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('country', CountryController::class)->except(['edit', 'update', 'show', 'create']);
            Route::resource('city', CityController::class)->except(['edit', 'show', 'create']);
            Route::resource('faq', FaqController::class)->except(['edit', 'show', 'create']);
            Route::resource('job-category', JobCategoryController::class)->except(['edit', 'show', 'create']);
            Route::resource('registration', RegistrationController::class)->except(['edit', 'show', 'create']);
            Route::get('activities', 'RegistrationController@activities')->name('activities.index');
            Route::get('jobs', 'JobController@index')->name('jobs.index');
            Route::get('freelancers', 'UserController@freelancers')->name('users.freelancers.index');
            Route::get('employers', 'UserController@employers')->name('users.employers.index');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});

