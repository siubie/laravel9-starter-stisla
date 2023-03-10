<?php

use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "role"], function () {

    Route::group(["prefix" => "assign"], function () {
        Route::get("", [AssignPermissionController::class, "index"])->name(".index");
        Route::get("/create", [AssignPermissionController::class, "create"])->name(".create");
        Route::get("/{role}/edit", [AssignPermissionController::class, "edit"])->name(".edit");
        Route::put("/{role}", [AssignPermissionController::class, "update"])->name(".update");
        Route::post("", [AssignPermissionController::class, "store"])->name(".store");
    });

    Route::group(["prefix" => "assign-user"], function () {
        Route::get("", [AssignUserToRoleController::class, "index"])->name("assign.user.index");
        Route::get("/create", [AssignUserToRoleController::class, "create"])->name("assign.user.create");
        Route::post("", [AssignUserToRoleController::class, "store"])->name("assign.user.store");
        Route::get("/{user}/edit", [AssignUserToRoleController::class, "edit"])->name("assign.user.edit");
        Route::put("/{user}", [AssignUserToRoleController::class, "update"])->name("assign.user.update");
    });

    Route::resource("", RoleController::class);
    Route::get("export", ExportRoleController::class)->name("role.export");
    Route::post("import", ImportRoleController::class)->name("role.import");


});
