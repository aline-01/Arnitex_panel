<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_message_replay_m extends Model
{
    protected $table = "admin_message_replay";
    protected $fillable = ["content","message_id"];
    use HasFactory;
}
