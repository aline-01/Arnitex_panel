<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\personel_m;
use App\Models\admins_m;
use App\Models\message_m;

class admin_ctl extends Controller
{
    public function admin_login() {
        if (!isset($_POST["password"])) {
            return view("admin_area/pages/login");
        }else {
            $this_admin = admins_m::where("password",request()->password)->get();
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
            dd(request()->all());
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
    public function send_file() {
        echo "Hello world";
    }
}
