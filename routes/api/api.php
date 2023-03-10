<?php

use Illuminate\Support\Facades\Route;
use Utils\ApiResponseUtils;

Route::get("", function () {
    $data = [
        "title" => "Stisla Starter Code",
        "powered_by" => "SMK Suhat Lowokwaru, Malang",
    ];
    return ApiResponseUtils::base($data, "Success Getting Project Info");
});
