<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightTicketsCategory extends Model
{
    protected $fillable=[
        'name'
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }


}
