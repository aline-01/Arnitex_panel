<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\personel_m;
use App\Models\file_m;
use App\Models\tasks_m;


class personel_ctl extends Controller
{
    public function login() {
        if (!isset($_POST["submit"])) {
            return view("personel_area/pages/login");
        }else {
            $Validation = Validator::make(request()->all(),[
                "username"=>"required",
                "password"=>"required",
            ],[
                "username.required"=>"نام کاربری را وارد کنید",
                "password.required"=>"رمز عبور مورد نیاز است",
            ])->validate();
            $this_personel = personel_m::where("name",request()->username)->where("perosnel_code",request()->password)->get();
            // dd($this_personel->Count());
            if ($this_personel->Count() > 0) {
                $name = "personel_access";
                $value = $this_personel[0]->id;
                request()->session()->put($name,$value);
                // session::put($name,$value);
                return redirect("/main panel");
            }else {
                return redirect("/personel/login")->with("not_found","حساب شما پیدا نشد");
            }

        }
    }
    public function personel_file() {
        if (!isset($_POST["submit"])) {
            $all_personel = personel_m::all();
            return view("personel_area/pages/send_file",[
                "all_personel"=>$all_personel,
            ]);
        }else {
            $Validation = Validator::make(request()->all(),[
                "personel"=>"required",
                // "password"=>"required",
            ],[
                "personel.required"=>"لطفا پرسنلی را که فایل را دریافت می کنند انتخاب کنید",
                // "password.required"=>"رمز عبور مورد نیاز است",
            ])->validate();
            if ($_FILES["personel_file"]["error"] == 0) {
                $personel_sender = request()->session()->get("personel_access");//who the send file
                $personel_target = request()->personel;//who send file for him
                $the_file = $_FILES["personel_file"];
                $path = "files/".$the_file["name"];
                $is_file_upload = move_uploaded_file($the_file["tmp_name"],$path);
                if (!$is_file_upload) {
                    return redirect()->back()->with("error_upload_file","بارگذاری پرونده ممکن نیست دوباره امتحان کنید یا با مدیر تماس بگیرید و این را گزارش کنید");
                }else {
                    file_m::create([
                        "name"=>$the_file["name"],
                        "path"=>$path,
                        "personel_id"=>$personel_sender,
                        "personel_target"=>$personel_target,
                    ]);
                    return redirect()->back()->with("file_uploaded_msg","فایل با موفقیت آپلود شد");
                }
            }else {
                return redirect()->back()->with("error_upload_file","بارگذاری پرونده ممکن نیست دوباره امتحان کنید یا با مدیر تماس بگیرید و این را گزارش کنید");

            }
        }        
    }
    public function all_file_list() {
        $this_personel = request()->session()->get("personel_access");
        $all_files = file_m::where("personel_target",$this_personel)->get();
        return view("personel_area/pages/all_files",[
            "all_file"=>$all_files,
        ]);
    }
    public function task_list() {
        $cureent_personel = request()->session()->get("personel_access");//user who login now
        $all_task = tasks_m::where("personel_id",$cureent_personel)->get();
        return view("personel_area/pages/tasks_list",[
            "all_task"=>$all_task,
        ]);
    }
}
