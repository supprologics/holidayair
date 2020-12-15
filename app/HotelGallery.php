<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelGallery extends Model
{
    protected $fillable=[
        'file_path','room_id','hotel_id',
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
