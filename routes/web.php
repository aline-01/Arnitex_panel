<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\messages_ctl;
use App\Http\Controllers\personel_ctl;
use App\Http\Controllers\admin_ctl;
use Illuminate\Support\Facades\Cookie;
use App\Http\Middleware\personel_access;
use App\Http\Middleware\admin_access;
use App\Models\message_m;


Route::get("/",function() {
    return redirect("/main panel");
});

Route::prefix("/admin area")->group(function() {
    $admin_ctl = "App\Http\Controllers\admin_ctl";
    Route::get("/login",$admin_ctl."@admin_login");
    Route::post("/login",$admin_ctl."@admin_login");
    Route::get("/main panel",$admin_ctl."@main_panel")->middleware("App\Http\Middleware\admin_access");
    Route::prefix("/personel")->group(function() {
        $admin_ctl = "App\Http\Controllers\admin_ctl";
        Route::get("/add personel",$admin_ctl."@add_personel")->middleware("App\Http\Middleware\admin_access");
        Route::post("/add personel",$admin_ctl."@add_personel")->middleware("App\Http\Middleware\admin_access");
        Route::get("/personel list",$admin_ctl."@personel_list")->middleware("App\Http\Middleware\admin_access");
        Route::get("/delete personel/{personel_id}",$admin_ctl."@delete_personel")->middleware("App\Http\Middleware\admin_access");
    });
    Route::prefix("/message")->group(function() {
        $admin_ctl = "App\Http\Controllers\admin_ctl";
        Route::get("/public message",$admin_ctl."@public_message")->middleware("App\Http\Middleware\admin_access");
        Route::post("/public message",$admin_ctl."@public_message")->middleware("App\Http\Middleware\admin_access");
        Route::get("/recent message",$admin_ctl."@recent_message")->middleware("App\Http\Middleware\admin_access");
        Route::post("/recent message",$admin_ctl."@recent_message")->middleware("App\Http\Middleware\admin_access");
        Route::get("/personel messages list",$admin_ctl."@personel_messages")->middleware("App\Http\Middleware\admin_access");
        Route::get("/replay message/{id}",$admin_ctl."@replay_message")->middleware("App\Http\Middleware\admin_access");
        Route::post("/replay message/{id}",$admin_ctl."@replay_message")->middleware("App\Http\Middleware\admin_access");
    });
    Route::prefix("/files")->group(function() {
        $admin_ctl = "App\Http\Controllers\admin_ctl";
        Route::get("/send file",$admin_ctl."@public_file")->middleware("App\Http\Middleware\admin_access");
        Route::post("/send file",$admin_ctl."@public_file")->middleware("App\Http\Middleware\admin_access");
        Route::get("/all files",$admin_ctl."@all_files")->middleware("App\Http\Middleware\admin_access");
        Route::get("/delete file/{file_id}",$admin_ctl."@delete_file");
    });
    Route::prefix("/tasks")->group(function() {
        $admin_ctl = "App\Http\Controllers\admin_ctl";
        Route::get("/add task",$admin_ctl."@add_task")->middleware("App\Http\Middleware\admin_access");
        
    });


});


Route::get('/main panel', function () {
    $this_user = request()->session()->get("personel_access");
    $last_messages = message_m::orderBy("id","desc")->where("personel_target",$this_user)->take(3)->get();
    return view("personel_area/index",[
        "last_message"=>$last_messages,
    ]);
})->middleware("App\Http\Middleware\personel_access");


Route::prefix("/message")->group(function() {
    $message_ctl = "App\Http\Controllers\messages_ctl";
    Route::get("/send personel message",$message_ctl."@personel_message")->middleware("App\Http\Middleware\personel_access");
    Route::post("/save message ",$message_ctl."@save_message")->middleware("App\Http\Middleware\personel_access");
    Route::get("/all message",$message_ctl."@all_messages")->middleware("App\Http\Middleware\personel_access");
    Route::get("/send message for manager",$message_ctl."@send_message_to_admin");
    Route::post("/send message for manager",$message_ctl."@send_message_to_admin");
    Route::get("/replay message/{message_id}",$message_ctl."@replay_message");
    Route::post("/replay message/{message_id}",$message_ctl."@replay_message");
});

Route::prefix("/personel")->group(function() {
    $personel_ctl = "App\Http\Controllers\personel_ctl";
    Route::get("/login",$personel_ctl."@login");
    Route::post("/login",$personel_ctl."@login");
});

Route::prefix("/file")->group(function() {
    $personel_ctl = "App\Http\Controllers\personel_ctl";
    Route::get("/send file",$personel_ctl."@personel_file")->middleware("App\Http\Middleware\personel_access");
    Route::post("/send file",$personel_ctl."@personel_file")->middleware("App\Http\Middleware\personel_access");
    Route::get("/all files list",$personel_ctl."@all_file_list")->middleware("App\Http\Middleware\personel_access");
});

Route::get("/set_test_cookie",function() {
    // cookie()->queue(cookie("personel_access",1,time()+12312313));
    dd(request()->cookie("personel_access"));
});

// this is a test route for developing app don't cate about this 
Route::get("/test",function() {
    request()->session()->forget("personel_access");
});
