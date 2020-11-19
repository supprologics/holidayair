<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    protected $fillable=[
        'file_path','post_id',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
