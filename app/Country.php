<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'code',
    ];

    public function areas(){
        return $this->hasMany(Area::class);
    }

    public function tours(){
        return $this->hasMany(Tour::class);
    }

    
    public function airlines(){
        return $this->hasMany(Airline::class);
    }

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
