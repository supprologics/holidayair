<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
