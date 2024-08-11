<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks_m extends Model
{
    protected $table = "task_list";
    protected $fillable = ["title","descryption","file","personel_id","is_it_done"];
    use HasFactory;
}
