<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HubSpotWebhookController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Página de inicio pública
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Rutas estáticas (públicas)
|--------------------------------------------------------------------------
*/
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Rutas para invitados (no autenticados)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren usuario logueado)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('/hubspot-webhook', [HubSpotWebhookController::class, 'handleWebhook'])->name('hubspot.webhook');

    /*
    |--------------------------------------------------------------------------
    | Rutas para USUARIOS con rol "user"
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:user'])->name('user.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        // Rutas para proyectos de usuario
        Route::resource('projects', ProjectController::class);
        // Rutas para la gestión de stages por parte del usuario
        Route::resource('projects.stages', StageController::class)->except(['index', 'destroy']);
        Route::get('/projects/{project}/stages/{stage}', [StageController::class, 'show'])->name('stages.show');
        Route::delete('/projects/{project}/stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');
        // Rutas para la gestión de documentos de usuario
        Route::resource('documents', DocumentController::class)->except(['show']);
        Route::get('/documents/{document}', [DocumentController::class, 'show'])->name('documents.show');
    });

    /*
    |--------------------------------------------------------------------------
    | Rutas para ADMINISTRADORES con rol "admin"
    |--------------------------------------------------------------------------
    */
    Route::prefix('administrador')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::post('/projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
        Route::post('/projects/{project}/reject', [ProjectController::class, 'reject'])->name('projects.reject');
        Route::get('/stages', [StageController::class, 'index'])->name('stages.index');
        Route::get('/projects/{project}/stages/{stage}', [StageController::class, 'show'])->name('stages.show');
        Route::delete('/projects/{project}/stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');
        Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Rutas para el perfil del usuario
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});