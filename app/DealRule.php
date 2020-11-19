<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealRule extends Model
{
    protected $fillable=[
        'deal_id','title','description'
    ];

    public function deal()
    {
        return $this->hasMany(Deal::class);
    }

}
