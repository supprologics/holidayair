<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightDealGallery extends Model
{
    protected $fillable=[
        'file_path','deal_id',
    ];

    public function deal(){
        return $this->belongsTo(Deal::class);
    }
}
