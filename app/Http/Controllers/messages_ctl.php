<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messages_ctl extends Controller
{
    public function personel_message() {
        return view("personel_area/pages/personel_message");
    }
    
}
