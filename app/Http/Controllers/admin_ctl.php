<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\personel_m;
use App\Models\message_m;
use App\Models\admin_message_m;
use App\Models\admin_message_replay_m;
use App\Models\file_m;

class admin_ctl extends Controller
{
    public function admin_login() {
        if (!isset($_POST["password"])) {
            return view("admin_area/pages/login");
        }else {
            $this_admin = personel_m::where("perosnel_code",request()->password)->where("access","admin")->get();
            if ($this_admin->Count() > 0) {
                //set the session of the access to panel
                $name = "admin_access";
                $value = $this_admin[0]->id;
                request()->session()->put($name,$value);
                // session::put($name,$value);
                return redirect("/admin area/main panel");
            }else {
                return redirect()->back()->with("permision_denied_admin","undifiend password");
            }
        }
    }
    public function main_panel() {
        return view("admin_area/index");
    }
    public function add_personel() {
        if (!isset($_POST["submit"])) {
            return view("admin_area/pages/add_personel");
        }else {
            // add personel to database 
            $Validation = Validator::make(request()->all(),[
                "name"=>"required|",
                "position"=>"required|",
                "personel_code"=>"required",
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                "name.required"=>"لطفا نام را وارد کنید",
                "personel_code"=>"کد رمز عبور را وارد کنید",
                "position.required"=>"لطفا موقعیت را وارد کنید",
            ])->validate();
            personel_m::create([
                "name"=>request()->name,
                "position"=>request()->position,
                "perosnel_code"=>request()->personel_code,
            ]);
            return redirect("/admin area/personel/add personel")->with("perosnel_added","اطلاعات شخص ذخیره شد");
        }
    }
    public function personel_list() {
        $all_personel_list = personel_m::all();
        return view("admin_area/pages/personel_list",[
            "personel_list"=>$all_personel_list,
        ]);
    }
    public function delete_personel($personel_id) {
        personel_m::destroy($personel_id);
        return redirect()->back()->with("personel_delete","شخص حذف شده است");
    }
    public function public_message() {
        if (!isset($_POST["submit"])) {
            $all_personel = personel_m::all();
            return view("admin_area/pages/public_message",[
                "all_personel"=>$all_personel,  
            ]);
        }else {
            //i don't know how to make this 
            // ): 
            // dd(request()->all());
            $array_of_personel_id = $headers = explode(',', $_POST["all_personel_data"]);
            foreach($array_of_personel_id as $personel_must_send) {
                message_m::create([
                    "content"=>request()->text,
                    "personel_target"=>$personel_must_send,
                    "personel_id"=>request()->session()->get("admin_access"),
                    "send_data"=>"asdasd",
                ]);
            }
            return redirect()->back()->with("public_message_have_been_send","پیام برای افراد ارسال شد");
        }
    }
    public function public_file() {
        $all_personel = personel_m::all();
        if (!isset($_POST["submit"])) {
            return view("admin_area/pages/file_message",[
                "all_personel"=>$all_personel,
            ]);
        }else {                
            // $path = "files/".$the_file["name"];
            // $is_file_upload = move_uploaded_file($the_file["tmp_name"],$path);
            //save the file --------------
            $the_file = $_FILES["the_file"];
            $path = "files/".$the_file["name"];
            $is_file_uploaded = move_uploaded_file($the_file["tmp_name"],$path);
            if (!$is_file_uploaded) {
                return redirect()->back()->with("unable_to_upload_file","بارگذاری پرونده ممکن نیست دوباره امتحان کنید یا با مدیر تماس بگیرید و این را گزارش کنید");
            }    
            //-------------------
            $array_of_personel_id = $headers = explode(',', $_POST["all_personel_data"]);
            foreach($array_of_personel_id as $personel_must_send) {
                file_m::create([
                    "name"=>$the_file['name'],
                    "path"=>$path,
                    "personel_id"=>request()->session()->get('admin_access'),
                    "personel_target"=>$personel_must_send,
                ]);
            }
            return redirect()->back()->with("file_have_been_send","فایل ارسال شد");
        }

    }
    public function recent_message() {
        if (isset($_POST["personel"]) && $_POST["personel"] == "all") {
            $all_messages = message_m::all();
        }else {
            if (!empty($_POST["personel"])) {
                //if want to see messages from a on person
                $all_messages = message_m::where("id",request()->personel)->get();
            }else {
                //if want to see all messages
                $all_messages = message_m::all();
            }
        }
        // dd($all_messages);
        // dd(request()->personel);
        $all_personel = personel_m::all();
        return view("admin_area/pages/recent_message",[
            "all_personel"=>$all_personel,
            "all_message"=>$all_messages,
        ]);
    }
    public function personel_messages() {
        $all_messages = admin_message_m::all();
        return view("admin_area/pages/personel_messages",[
            "all_message"=>$all_messages,
        ]);
    }
    public function replay_message($message_id) {
        $message = admin_message_m::where("id",$message_id)->get();
        $sender = personel_m::where("id",$message[0]->sender)->get();
        if (!isset($_POST["submit"])) {
            return view("admin_area/pages/replay_to_message",[
                "message_content"=>$message,
                "who_send"=>$sender,
            ]);
        }else {
            $Validation = Validator::make(request()->all(),[
                "text"=>"required|",
                // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                "text.required"=>"لطفا متن پاسخ را تایپ کنید", 
            ])->validate();            
            admin_message_replay_m::create([
                "content"=>request()->text,
                "message_id"=>$message_id,
            ]);
            return redirect()->back()->with("message_send","پاسخ ارسال شده است");
        }  
    }
    public function all_files() {
        $all_files = file_m::all();
        return view("personel_area/pages/all_files",[
            "all_file"=>$all_files,
        ]);
    }
    public function delete_file($file_id) {
        file_m::destroy($file_id);
        return redirect()->back()->with("file_has_deleted","پرونده حذف شد");
    }
    public function add_task() {
        echo "<center>";
        echo "<h1>Hello world</h1>";
        echo "</center>";
    }

}
