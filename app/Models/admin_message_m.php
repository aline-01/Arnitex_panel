<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_message_m extends Model
{
    protected $table = "admin_message";
    protected $fillable = ["content","sender"];
    use HasFactory;
}
