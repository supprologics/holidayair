<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelHasAmenitie extends Model
{
    protected $fillable = [
        'hotel_id','amenitie_id'
    ];
}
