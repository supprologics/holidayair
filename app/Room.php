<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        'name','hotel_id','description','image','amount','rooms','adults','kids','checkindate','checkutdate','bookings','flag',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}

