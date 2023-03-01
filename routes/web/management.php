<?php

use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "management"], function () {

    Route::group(["prefix" => "user"], function () {
        Route::resource("", UserController::class);
        Route::post("import", [UserController::class, "import"])->name("user.import");
        Route::get("export", [UserController::class, "export"])->name("user.export");
    });

    Route::group(["prefix" => "menu"], function () {
        Route::resource("group", MenuGroupController::class);
        Route::resource("item", MenuItemController::class);
    });

});
