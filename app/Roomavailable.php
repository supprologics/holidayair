<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roomavailable extends Model
{
    protected $fillable=[
        'room_id','hotel_id','checkindate','checkutdate',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
