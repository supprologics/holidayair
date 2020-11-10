<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name','district','country_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
