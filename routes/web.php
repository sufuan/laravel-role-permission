<?php

use App\Http\Controllers\Backend\EventsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\FormBuilderController;
use App\Http\Controllers\frontend\EventsControllerFrontent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/banner', function () {


    return view('backend.pages.banner.index');
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/store_default_post', [PostController::class, 'storeDefault'])->name('store_default_post');
    Route::patch('/post/{post}/update_status', [PostController::class, 'updateStatus'])->name('post.update_status');
});







// frontend form builder 

Route::get('form-builder', [FormBuilderController::class, 'index']);
Route::view('formbuilder', 'FormBuilder.create');
Route::post('save-form-builder', [FormBuilderController::class, 'create']);
Route::delete('form-delete/{id}', [FormBuilderController::class, 'destroy']);
Route::view('edit-form-builder/{id}', 'FormBuilder.edit');
Route::get('get-form-builder-edit', [FormBuilderController::class, 'editData']);
Route::post('update-form-builder', [FormBuilderController::class, 'update']);
Route::view('read-form-builder/{id}', 'FormBuilder.read');
Route::get('get-form-builder', [FormsController::class, 'read']);
Route::post('save-form-transaction', [FormsController::class, 'create']);

// End Form Builder===============================================================




// frontent   event

Route::get('events', [EventsControllerFrontent::class, 'viewAll'])->name('events.viewAll');
Route::get('events/previous', [EventsControllerFrontent::class, 'previousEvents'])->name('events.previous');
Route::get('events/upcoming', [EventsControllerFrontent::class, 'upcomingEvents'])->name('events.upcoming');





Route::get('/volunteer/register', [VolunteerController::class, 'showRegisterForm'])->name('volunteer.register');
Route::post('/volunteer/register', [VolunteerController::class, 'register']);




Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);




    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Volunteer Management Routes
    Route::get('/pendingvolunteers', 'Backend\VolunteerController@showPendingVolunteers')->name('admin.volunteers');
    Route::get('/volunteers', 'Backend\VolunteerController@showVolunteersView')->name('admin.pendingvolunteers');
    Route::post('/volunteers/approve/{id}', 'Backend\VolunteerController@approveVolunteer')->name('admin.volunteers.approve');
    Route::patch('/volunteers/status/{id}', 'Backend\VolunteerController@updateVolunteerStatus')->name('admin.volunteers.update_status');


    // events 
    Route::get('events-list', [EventsController::class, 'list'])->name('events.list');
    Route::post('events/{event}/countdown', [EventsController::class, 'updateCountdown'])->name('events.updateCountdown');
    Route::get('events/{event}/edit-details', [EventsController::class, 'editDetails'])->name('events.editDetails');
    Route::get('events/{event}/details', [EventsController::class, 'showDetails'])->name('events.showDetails');


    // Display a listing of the resource.
    Route::get('events', [EventsController::class, 'index'])->name('events.index');

    Route::get('events-refetch', [EventsController::class, 'refetchEvents'])->name('events.refetch');
    Route::post('events', [EventsController::class, 'store'])->name('events.store');

    // Store a newly created resource in storage.


    // Display the specified resource.
    Route::get('events/{event}', [EventsController::class, 'show'])->name('events.show');

    // Show the form for editing the specified resource.
    Route::get('events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');

    // Update the specified resource in storage.
    Route::put('events/{event}', [EventsController::class, 'update'])->name('events.update');

    // Remove the specified resource from storage.
    Route::delete('events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');


    // Route::group(['prefix' => 'templates'], function () {
    //     Route::get('/', 'CertificateController@CertificatesTemplatesList');
    //     Route::get('/new', 'CertificateController@CertificatesNewTemplate');
    //     Route::post('/store', 'CertificateController@CertificatesTemplateStore');
    //     Route::post('/preview', 'CertificateController@CertificatesTemplatePreview');
    //     Route::get('/{template_id}/edit', 'CertificateController@CertificatesTemplatesEdit');
    //     Route::post('/{template_id}/update', 'CertificateController@CertificatesTemplateStore');
    //     Route::get('/{template_id}/delete', 'CertificateController@CertificatesTemplatesDelete');
    // });
});

require __DIR__ . '/auth.php';
