<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTour extends Model
{
    protected $fillable = [
        'tour_id','date','adults','kids','first_name','last_name','personal_address','passport',
        'email_address','country_code','phone_number',
    ];

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
