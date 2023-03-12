<?php

use App\Http\Controllers\Permission\ExportPermissionController;
use App\Http\Controllers\Permission\ImportPermissionController;
use App\Http\Controllers\Permission\PermissionController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "permission"], function () {

    Route::resource('permission', PermissionController::class);
    Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
    Route::post('permission/import', ImportPermissionController::class)->name('permission.import');
});
