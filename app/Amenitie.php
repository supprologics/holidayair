<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenitie extends Model
{
    protected $fillable = [
        'name','icon'
    ];

    public function hotels(){
        return $this->belongsToMany(Hotel::class,'hotel_has_amenities');
    }
}
