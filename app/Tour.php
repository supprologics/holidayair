<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable=[
        'category_id','country_id','name','description','duration','days','nights',
        'amount','rating','is_highlight','online','hits'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function itineraries(){
        return $this->hasMany(Itinerary::class);
    }

    public function txt_details(){
        return $this->hasMany(Txt_details::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function routes(){
        return $this->hasMany(Route::class);
    }
}
