<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = array('width', 'length', 'height', 'weight', 'receiver', 'receiver_address' ,'shipment_id');
    public function shipment()
    {
        return $this->belongsTo('App\Models\Shipment');
    }
}
