<?php

namespace App\Http\Controllers;
use App\Models\personel_m;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\message_m;
require_once("includes/jdf.php");

class messages_ctl extends Controller
{
    public function personel_message() {
        $all_personel = personel_m::all();
        return view("personel_area/pages/personel_message",[
            "all_personel"=>$all_personel,
        ]);
    }
    public function save_message() {
        if (!isset($_POST["submit"])) {
            return redirect()->back();
        }
        $Validation = Validator::make(request()->all(),[
            "personel"=>"required",
            "text"=>"required",
        ],[
            "personel.required"=>"کارمند مد نظر برای ارسال پیام رو مشخص کنید",
            "text.required"=>"لطفا متنی را که می خواهید ارسال کنید بنویسید",
        ])->validate();
        // welcome back modify this code 
        message_m::create([
            "content"=>request()->text,
            "personel_target"=>request()->personel,
            "send_data"=>"۱۴".jdate("y/m/d"),
            "personel_id"=>request()->session()->get("personel_access"),
        ]);
        return redirect("/main panel")->with("message_send","your message have been send");
    }
    public function all_messages() {
        $all_message = message_m::where("personel_target",request()->session()->get("personel_access"))->get();
        return view("personel_area/pages/all_messages",[
            "all_message"=>$all_message,
        ]);
    }
    public function send_message_to_admin() {
        return view("personel_area/pages/message_to_admin");
    }
    
}
