<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_m extends Model
{
    protected $table = "files";
    protected $fillable = ["name","path","personel_id","personel_target"];
    use HasFactory;
}
