<?php

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

Route::get('/', function () {
    return view('auth/login');
});

//Route::group(['middleware' => ['auth', 'verified']], function () {
//    Route::get('/dashboard', function () {
//        return view('home', ['users' => User::get(),]);
//    });

//
//    Route::prefix('user-management')->group(function () {
//        Route::resource('user', UserController::class);
//        Route::post('import', [UserController::class, 'import'])->name('user.import');
//        Route::get('export', [UserController::class, 'export'])->name('user.export');
//        Route::get('demo', DemoController::class)->name('user.demo');
//    });

//    Route::prefix('menu-management')->group(function () {
//        Route::resource('menu-group', MenuGroupController::class);
//        Route::resource('menu-item', MenuItemController::class);
//    });

//    Route::group(['prefix' => 'role-and-permission'], function () {
//
//        Route::resource('role', RoleController::class);
//        Route::get('role/export', ExportRoleController::class)->name('role.export');
//        Route::post('role/import', ImportRoleController::class)->name('role.import');
//
//        Route::resource('permission', PermissionController::class);
//        Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
//        Route::post('permission/import', ImportPermissionController::class)->name('permission.import');
//
//        Route::get('assign', [AssignPermissionController::class, 'index'])->name('assign.index');
//        Route::get('assign/create', [AssignPermissionController::class, 'create'])->name('assign.create');
//        Route::get('assign/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign.edit');
//        Route::put('assign/{role}', [AssignPermissionController::class, 'update'])->name('assign.update');
//        Route::post('assign', [AssignPermissionController::class, 'store'])->name('assign.store');
//
//        Route::get('assign-user', [AssignUserToRoleController::class, 'index'])->name('assign.user.index');
//        Route::get('assign-user/create', [AssignUserToRoleController::class, 'create'])->name('assign.user.create');
//        Route::post('assign-user', [AssignUserToRoleController::class, 'store'])->name('assign.user.store');
//        Route::get('assing-user/{user}/edit', [AssignUserToRoleController::class, 'edit'])->name('assign.user.edit');
//        Route::put('assign-user/{user}', [AssignUserToRoleController::class, 'update'])->name('assign.user.update');
//    });
//});
