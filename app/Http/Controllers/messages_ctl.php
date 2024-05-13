<?php

namespace App\Http\Controllers;
use App\Models\personel_m;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\message_m;
use App\Models\replay_message;
use App\Models\admin_message_m;
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
        if (!isset($_POST["submit"])) {
            return view("personel_area/pages/message_to_admin");
        }else {
            $Validation = Validator::make(request()->all(),[
                // "personel"=>"required",
                "text"=>"required",
            ],[
                // "personel.required"=>"کارمند مد نظر برای ارسال پیام رو مشخص کنید",
                "text.required"=>"لطفا متنی را که می خواهید ارسال کنید بنویسید",
            ])->validate();
            admin_message_m::create([
                "sender"=>request()->session()->get("personel_access"),
                "content"=>request()->text,
            ]);
            return redirect()->back()->with("message_send_to_admin","پیام شما برای مدیریت ارسال شد");
        }
    }
    public function replay_message($message_id) {
        $this_message = message_m::where("id",$message_id)->get();
        $who_send =  personel_m::where("id",$this_message[0]->personel_id)->get();
        if (!isset($_POST["submit"])) {
            return view("personel_area/pages/replay_message",[
                "message_content"=>$this_message,
                "who_send"=>$who_send,
            ]);
        }else {
            $Validation = Validator::make(request()->all(),[
                "text"=>"required|",
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                "text.required"=>"لطفا متن پاسخ را تایپ کنید", 
            ])->validate();            
            replay_message::create([
                "content"=>request()->text,
                "personel_id"=>request()->session()->get("personel_access"),
                "personel_target"=>$who_send[0]->id,
                "message_id"=>$message_id,
                "send_data"=>"This is builtshit ",//this is builtshit don't care about this
            ]);
            return redirect()->back()->with("message_send","پاسخ ارسال شده است");
        }
    }
    
}
