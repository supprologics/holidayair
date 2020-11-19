<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable=[
        'code','country_id','name','logo'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
