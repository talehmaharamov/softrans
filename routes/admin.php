<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Backend Controllers
use App\Http\Controllers\Backend\AuthController as BAuth;
use App\Http\Controllers\Backend\AboutController as BAbout;
use App\Http\Controllers\Backend\CategoryController as BCategory;
use App\Http\Controllers\Backend\ContactController as BContact;
use App\Http\Controllers\Backend\HomeController as BHome;
use App\Http\Controllers\Backend\LanguageController as LChangeLan;
use App\Http\Controllers\Backend\SettingController as BSetting;
use App\Http\Controllers\Backend\SiteLanguageController as BSiteLan;
use App\Http\Controllers\Backend\AdminController as BAdmin;
use App\Http\Controllers\Backend\InformationController as BInformation;
use App\Http\Controllers\Backend\PostController as BPost;
use App\Http\Controllers\Backend\MetaController as BMeta;
use App\Http\Controllers\Backend\NewsletterController as BNewsletter;
use App\Http\Controllers\Backend\ReportController as BReport;
use App\Http\Controllers\Backend\Statistics as BStatistics;
use App\Http\Controllers\Backend\SliderController as BSlider;
use App\Http\Controllers\Backend\PermissionController as BPermission;

//General
use Spatie\Analytics\Period;

Route::fallback(function () {
    return view('backend.errors.404');
});
Route::group(['name' => 'auth1'], function () {
    Route::get('/login', [BAuth::class, 'showLoginForm'])->name('loginForm');
    Route::post('loginAdmin', [BAuth::class, 'login'])->name('login');
    Route::post('logout', [BAuth::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
//General
    Route::get('/change-language/{lang}', [LChangeLan::class, 'switchLang'])->name('switchLang');
    Route::get('/', [BHome::class, 'index'])->name('index');
    Route::get('/dashboard', [BHome::class, 'index'])->name('dashboard');
    Route::get('/reports', [BReport::class, 'index'])->name('report');
    Route::get('/give-permission', [BPermission::class, 'givePermission'])->name('givePermission');
    Route::get('/give-permission-to-user/{user}', [BPermission::class, 'giveUserPermission'])->name('giveUserPermission');
    Route::get('/contact-us/{id}/read', [BContact::class, 'readContact'])->name('readContact');
    Route::post('/give-permission-to-user-update', [BPermission::class, 'giveUserPermissionUpdate'])->name('givePermissionUserUpdate');
    Route::get('/posts/pendings', [BPost::class, 'pendingPost'])->name('pendingPost');
    Route::get('/posts/pending/{id}', [BPost::class, 'pendingPostId'])->name('pendingPostId');
    Route::get('/posts/pending-post/{id}', [BPost::class, 'ppost'])->name('ppost');
    Route::get('/posts/aprove/{id}', [BPost::class, 'approvePost'])->name('approvePost');
    Route::get('/slider/{id}/change-order', [BSlider::class, 'sliderOrder'])->name('sliderOrder');
    Route::get('/newsletter/history', [BNewsletter::class, 'newsletterHistory'])->name('newsletterHistory');
//Statuses
    Route::group(['name' => 'status'], function () {
        Route::get('partners/{id}/change-status', [App\Http\Controllers\Backend\PartnersController::class, 'status'])->name('partnersStatus');

        Route::get('cars/{id}/change-status', [App\Http\Controllers\Backend\CarsController::class, 'status'])->name('carsStatus');

        Route::get('about/{id}/change-status', [App\Http\Controllers\Backend\AboutController::class, 'status'])->name('aboutStatus');


        Route::get('/site-language/{id}/change-status', [BSiteLan::class, 'siteLanStatus'])->name('siteLanStatus');
        Route::get('/categories/{id}/change-status', [BCategory::class, 'categoryStatus'])->name('categoryStatus');
        Route::get('/settings/{id}/change-status', [BSetting::class, 'settingStatus'])->name('settingStatus');
        Route::get('/seo/{id}/change-status', [BMeta::class, 'seoStatus'])->name('seoStatus');
        Route::get('/slider/{id}/change-status', [BSlider::class, 'sliderStatus'])->name('sliderStatus');
        Route::get('/post/{id}/change-status', [BPost::class, 'postStatus'])->name('postStatus');
    });
//Delete
    Route::group(['name' => 'delete'], function () {
        Route::get('partners/{id}/delete', [App\Http\Controllers\Backend\PartnersController::class, 'delete'])->name('partnersDelete');

        Route::get('cars/{id}/delete', [App\Http\Controllers\Backend\CarsController::class, 'delete'])->name('carsDelete');

        Route::get('about/{id}/delete', [App\Http\Controllers\Backend\AboutController::class, 'delete'])->name('aboutDelete');

        Route::get('/site-languages/{id}/delete', [BSiteLan::class, 'delSiteLang'])->name('delSiteLang');
        Route::get('/categories/{id}/delete', [BCategory::class, 'delCategory'])->name('delCategory');
        Route::get('/contact-us/{id}/delete', [BContact::class, 'delContactUS'])->name('delContactUS');
        Route::get('/settings/{id}/delete', [BSetting::class, 'delSetting'])->name('delSetting');
        Route::get('/users/{id}/delete', [BAdmin::class, 'delAdmin'])->name('delAdmin');
        Route::get('/seo/{id}/delete', [BMeta::class, 'delSeo'])->name('delSeo');
        Route::get('/slider/{id}/delete', [BSlider::class, 'delSlider'])->name('delSlider');
        Route::get('/report/{id}/delete', [BReport::class, 'delReport'])->name('delReport');
        Route::get('/report/clean-all', [BReport::class, 'cleanAllReport'])->name('cleanAllReport');
        Route::get('/permission/{id}/delete', [BPermission::class, 'delPermission'])->name('delPermission');
        Route::get('/post/{id}/delete', [BPost::class, 'delPost'])->name('delPost');
        Route::get('/newsletter/{id}/delete', [BNewsletter::class, 'delNewsletter'])->name('delNewsletter');

    });
//Resources
    Route::group(['name' => 'resource'], function () {
        Route::resource('/partners', App\Http\Controllers\Backend\PartnersController::class);
        Route::resource('/cars', App\Http\Controllers\Backend\CarsController::class);
        Route::resource('/categories', BCategory::class);
        Route::resource('/site-languages', BSiteLan::class);
        Route::resource('/contact-us', BContact::class);
        Route::resource('/settings', BSetting::class);
        Route::resource('/users', BAdmin::class);
        Route::resource('/my-informations', BInformation::class);
        Route::resource('/posts', BPost::class);
        Route::resource('/seo', BMeta::class);
        Route::resource('/newsletter', BNewsletter::class);
        Route::resource('/statistics', BStatistics::class);
        Route::resource('/slider', BSlider::class);
        Route::resource('/permissions', BPermission::class);
        Route::resource('/about', BAbout::class);
    });
});
