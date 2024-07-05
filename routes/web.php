<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\FormBuilderController;

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
    Route::get('/volunteers', 'Backend\VolunteerController@showPendingVolunteers')->name('admin.volunteers');
    Route::post('/volunteers/approve/{id}', 'Backend\VolunteerController@approveVolunteer')->name('admin.volunteers.approve');
});





// Step 1
Route::get('form-builder', [FormBuilderController::class, 'index']);

// Step 2
Route::view('formbuilder', 'FormBuilder.create');

// Step 3
Route::post('save-form-builder', [FormBuilderController::class, 'create']);

// Step 4
Route::delete('form-delete/{id}', [FormBuilderController::class, 'destroy']);

// Step 5
Route::view('edit-form-builder/{id}', 'FormBuilder.edit');
Route::get('get-form-builder-edit', [FormBuilderController::class, 'editData']);
Route::post('update-form-builder', [FormBuilderController::class, 'update']);

// Step 6
Route::view('read-form-builder/{id}', 'FormBuilder.read');
Route::get('get-form-builder', [FormsController::class, 'read']);
Route::post('save-form-transaction', [FormsController::class, 'create']);

// End Form Builder===============================================================




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::post('/store_default_post', [PostController::class, 'storeDefault'])->name('store_default_post');
    Route::patch('/post/{post}/update_status', [PostController::class, 'updateStatus'])->name('post.update_status');
});


Route::get('/volunteer/register', [VolunteerController::class, 'showRegisterForm'])->name('volunteer.register');
Route::post('/volunteer/register', [VolunteerController::class, 'register']);

require __DIR__ . '/auth.php';
