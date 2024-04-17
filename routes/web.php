<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\messages_ctl;


Route::get('/', function () {
    return view("personel_area/index");
});

Route::prefix("/message")->group(function() {
    $message_ctl = "App\Http\Controllers\messages_ctl";
    Route::get("/send personel message",$message_ctl."@personel_message");
    // Route::get("/");
});
