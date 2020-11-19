<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=[
        'blog_category_id','country_id','area_id','name','description_short',
        'description_full','tags','flag','cover'
    ];

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function gallery(){
        return $this->hasMany(PostGallery::class);
    }
}
