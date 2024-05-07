<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personel_m extends Model
{
    protected $table = "personel";
    protected $fillable = ["name","perosnel_code","position"];
    use HasFactory;
}
