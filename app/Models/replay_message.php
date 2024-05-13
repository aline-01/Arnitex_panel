<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replay_message extends Model
{
    protected $table = "replay_message";
    protected $fillable = ["content","personel_id","personel_target","message_id","send_data"];
    use HasFactory;
}
