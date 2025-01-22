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
| Rutas para invitados (no autenticados)
|--------------------------------------------------------------------------
|
| Solo se puede acceder a estas rutas si NO estás autenticado.
| Incluyen registro, login y recuperación de contraseña.
|
*/
Route::middleware('guest')->group(function () {
    // Registro
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    // Recuperación de contraseña
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren usuario logueado)
|--------------------------------------------------------------------------
|
| Todas estas rutas exigen que el usuario haya iniciado sesión.
|
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Verificación de correo
    |--------------------------------------------------------------------------
    */
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    /*
    |--------------------------------------------------------------------------
    | Confirmación / Actualización de contraseña
    |--------------------------------------------------------------------------
    */
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    /*
    |--------------------------------------------------------------------------
    | Cerrar sesión
    |--------------------------------------------------------------------------
    */
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    /*
    |--------------------------------------------------------------------------
    | VISUALIZACIÓN de documentos (accesible a cualquier usuario autenticado)
    |--------------------------------------------------------------------------
    |
    | No usamos 'role:user' o 'role:admin' para que ambos puedan verlos.
    | El controlador 'show' decide si aborta(403) si no es el dueño ni admin.
    |
    */
    Route::get('/documents/{document}', [DocumentController::class, 'show'])
        ->name('documents.show');

    /*
    |--------------------------------------------------------------------------
    | Webhook HubSpot (ejemplo, accesible a cualquier user auth)
    |--------------------------------------------------------------------------
    */
    Route::post('/hubspot-webhook', [HubSpotWebhookController::class, 'handleWebhook'])
        ->name('hubspot.webhook');

    /*
    |--------------------------------------------------------------------------
    | Rutas estáticas adicionales (About, Services, Contact)
    |--------------------------------------------------------------------------
    |
    | Aquí las protegemos con 'auth'. Si quisieras que sean públicas,
    | podrías sacarlas fuera del middleware 'auth'.
    |
    */
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/services', function () {
        return view('services');
    })->name('services');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    /*
    |--------------------------------------------------------------------------
    | Perfil de usuario (cualquier rol)
    |--------------------------------------------------------------------------
    |
    | Para que un usuario (sea admin o user) pueda editar su perfil.
    |
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Grupo de rutas para USUARIOS con rol "user"  =>  /user/...
    |--------------------------------------------------------------------------
    |
    | El middleware 'role:user' se asegura de que el usuario
    | sea exactamente de rol user. (Admin obtendrá 403)
    |
    */
    Route::prefix('user')->middleware(['role:user'])->group(function () {

        // Dashboard de usuario
        Route::get('/dashboard', [UserController::class, 'dashboard'])
            ->name('user.dashboard');

        /*
        |----------------------------------------------------------------------
        | CRUD de Proyectos (solo del usuario logueado)
        |----------------------------------------------------------------------
        */
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        /*
        |----------------------------------------------------------------------
        | CRUD de Etapas (Stages) para el usuario
        |----------------------------------------------------------------------
        */
        Route::get('/stages/create', [StageController::class, 'create'])->name('stages.create');
        Route::post('/stages', [StageController::class, 'store'])->name('stages.store');
        Route::get('/stages/{stage}', [StageController::class, 'show'])->name('stages.show');
        Route::get('/stages/{stage}/edit', [StageController::class, 'edit'])->name('stages.edit');
        Route::put('/stages/{stage}', [StageController::class, 'update'])->name('stages.update');
        Route::delete('/stages/{stage}', [StageController::class, 'destroy'])->name('stages.destroy');

        /*
        |----------------------------------------------------------------------
        | CRUD de Documentos PARA EL USUARIO (index, create, edit, destroy)
        |----------------------------------------------------------------------
        | - "show" está fuera (arriba), para que admin también lo vea.
        | - "index" aquí muestra SOLO documentos del usuario.
        */
        Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
        Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
        Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
        Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Grupo de rutas para ADMINISTRADORES con rol "admin"  =>  /admin/...
    |--------------------------------------------------------------------------
    |
    | El middleware 'role:admin' se asegura de que sea un usuario con rol admin.
    |
    */
    Route::prefix('admin')->middleware(['role:admin'])->group(function () {

        // Dashboard de administrador
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        /*
        |----------------------------------------------------------------------
        | Proyectos (de cualquier usuario)
        |----------------------------------------------------------------------
        */
        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');

        // Aprobar / Rechazar proyecto
        Route::post('/projects/{project}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
        Route::post('/projects/{project}/reject', [ProjectController::class, 'reject'])->name('projects.reject');

        /*
        |----------------------------------------------------------------------
        | Etapas (Stages) - Vista de admin
        |----------------------------------------------------------------------
        */
        Route::get('/stages/{stage}', [StageController::class, 'show'])->name('admin.stages.show');
        // (Podrías crear edit/update/destroy si el admin también maneja eso)

        /*
        |----------------------------------------------------------------------
        | Documentos (admin ve TODOS)
        |----------------------------------------------------------------------
        | Ejemplo si quieres que admin tenga su propio index de docs:
        */
        Route::get('/documents', function () {
            // Podrías crear un método en DocumentController
            // que muestre todos los docs sin filtrar
            return App\Models\Document::with('project')->get();
        })->name('admin.documents.index');
        // O un custom DocumentController@adminIndex
    });
});
