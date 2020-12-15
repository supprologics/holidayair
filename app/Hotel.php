<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable=[
        'country_id','hotelcategory_id','name','description','logo','city','flag','lat','lng','minstay','rating',
    ];

    public function hotelcategory(){
        return $this->belongsTo(HotelCategory::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function amenities(){
        return $this->belongsToMany(Amenitie::class,'hotel_has_amenities');
    }

    public function gallery()
    {
        return $this->hasMany(HotelGallery::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}








