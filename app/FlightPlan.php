<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightPlan extends Model
{
    protected $fillable=[
        'deal_id','airline_id','takeoff_airport','landing_airport','time_hours','time_min',
    ];

    public function deal(){
        return $this->belongsTo(Deal::class);
    }
    
    public function airline(){
        return $this->belongsTo(Airline::class);
    }
}
