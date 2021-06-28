<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $table ="table_branches";
    protected $fillable =[
        "address",
        "city",
        "country",
        "zip_code",
        "phone_number"
    ];
}
