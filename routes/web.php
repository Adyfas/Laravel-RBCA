<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts', [PostController::class, 'store']);
});


Route::get('/setup-rbca', function(){
    $createPost = Permission::firstOrCreate([
        'name'=>'posts.create'
    ]);

    $adminRole = Role::firstOrCreate([
        'name'=>'admin'
    ]);

    $staffRole = Role::firstOrCreate([
        'name'=>'staff'
    ]);

    $adminRole->givePermissionTo($createPost);

    User::where('email', 'admin@gmail.com')
    ->first()
    ->assignRole($adminRole);

    User::where('email', 'staff@gmail.com')
    ->first()
    ->assignRole($staffRole);


    return 'berhasil kayanya';

});

require __DIR__.'/auth.php';
