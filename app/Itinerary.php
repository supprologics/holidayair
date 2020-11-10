<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable=[
        'title','tour_id','description',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
