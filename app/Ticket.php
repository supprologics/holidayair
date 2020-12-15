<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable=[
        'airline_id','flightticketscategory_id','name','amount','flight_type'
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
    
    public function flightticketscategory()
    {
        return $this->belongsTo(FlightTicketsCategory::class);
    }

}
