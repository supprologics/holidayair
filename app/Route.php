<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable=[
        'name','lat','lng','go_order','tour_id',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
