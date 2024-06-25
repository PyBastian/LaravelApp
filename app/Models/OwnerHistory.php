<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerHistory extends Model
{
    protected $fillable = [
        'vehicle_id', 'owner_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    
}
