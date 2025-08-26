<?php

   use App\Http\Controllers\ProjectController;
   use Illuminate\Support\Facades\Route;
   use App\Http\Controllers\CommentController;
   use App\Http\Controllers\LikeController;

   Route::get('/', function () {
       return view('welcome');
   });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');





   Route::middleware(['auth', 'role:designer'])->group(function () {
    // Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    // Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
});
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
   Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
   Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

   Route::middleware(['auth'])->group(function () {
       Route::post('/projects/{project}/comments', [CommentController::class, 'store'])->name('comments.store');
       Route::post('/projects/{project}/likes', [LikeController::class, 'store'])->name('likes.store');
       Route::delete('/projects/{project}/likes', [LikeController::class, 'destroy'])->name('likes.destroy');
   });

   Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::patch('/admin/users/{user}', [\App\Http\Controllers\AdminController::class, 'updateUserRole'])->name('admin.users.update');
});

require __DIR__.'/auth.php';