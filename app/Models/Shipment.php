<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = array('branch_id', 'from_address', 'from_date', 'to_address', 'to_date', 'driver_id');
    public function packages()
    {
        return $this->hasMany('App\Models\Package');
    }
    public function shipment_tracks() {
        return $this->hasMany('App\Models\ShipmentTrack');
    }
    public function branch() {
        return $this->belongsTo(Branches::class);
    }

    public function driver() {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function getStatusAttribute() {
        return $this->shipment_tracks()->orderBy('created_at', 'desc')->first()->status;
    }
    public function getStatusInTextAttribute() {
        $status = $this->getStatusAttribute();
        switch ($status) {
            case 0:
                return 'Newly Created';
            case 1:
                return 'Packages gathered at branch';
            case 2:
                return 'Accepted by courier';
            case 3:
                return 'Shipping';
            case 4:
                return 'Arrived at destination, waiting for receivers';
            case 5:
                return 'Delivered';
            case -1:
                return 'Failed to be delivered';
        }
    }

    public function getShipmentTypeAttribute() {
        if ($this->type == '1') return 'Pickup';
        return 'Delivery';
    }
}
