<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentTrack extends Model
{
    use HasFactory;
    public function shipment()
    {
        return $this->belongsTo('App\Models\Shipment');
    }
    public function getStatusInTextAttribute() {
        switch ($this->status) {
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
}
