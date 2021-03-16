<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable=[
        'airline_id','country_id','name','flight_type','amount','description','class_type','cancellation_fee','flight_change_fee'
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
    
    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function flightplans()
    {
        return $this->hasMany(FlightPlan::class);
    }

    
    public function dealrules()
    {
        return $this->hasMany(DealRule::class);
    }

    public function gallery()
    {
        return $this->hasMany(FlightDealGallery::class);
    }

        
    public function class_type()
    {
        return $this->belongsTo(FlightTicketsCategory::class,'class_type');
    }
}
