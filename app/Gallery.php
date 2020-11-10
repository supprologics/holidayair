<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
        'file_path','tour_id',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
