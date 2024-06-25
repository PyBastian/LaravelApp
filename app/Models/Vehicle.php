<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand', 'model', 'license_plate', 'year', 'price', 'user_id',
    ];

    public function owner()
    {
        return $this->belongsTo(owner::class,'user_id');
        // return $this->belongsTo('App\Owner', 'user_id');
    }
    // public function ownerHistories()
    // {
    //     return $this->hasMany(OwnerHistory::class);
    // }
    // public function addOwner($ownerId)
    // {
    //     // Update the current owner
    //     $this->user_id = $ownerId;
    //     $this->save();
    //     // Add to owner history
    //     return $this->ownerHistories()->create(['owner_id' => $ownerId]);
    // }
}
