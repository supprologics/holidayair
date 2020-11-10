<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Txt_details extends Model
{
    protected $fillable=[
        'detail_type','text','tour_id',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
