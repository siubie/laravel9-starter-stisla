<?php

use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "permission"], function () {

    Route::resource('permission', PermissionController::class);
    Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
    Route::post('permission/import', ImportPermissionController::class)->name('permission.import');

});
