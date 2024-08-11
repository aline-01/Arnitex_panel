<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message_m extends Model
{
    protected $table = "message";
    protected $fillable = ["content","personel_id","personel_target","send_data"];

    use HasFactory;
}
