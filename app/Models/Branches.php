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

    public function shipments() {
        return $this->hasMany(Shipment::class);
    }
    public function users() {
        return $this->hasMany(User::class);
    }

    public function getFullAddressAttribute() {
        return 'Branch ' . $this->id . ' (' . $this->address . ', ' . $this->city . ', ' . $this->country . ')';
    }
}
