<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gifs extends Model
{
    use HasFactory;

    public function userInfo()
    {
        return $this->belongsTo(siteUsers::class, "user_id", "id");
    }

    public function tags()
    {
        return $this->hasMany(Tags::class, 'gif_id', 'id');
    }

    public function categoryInfo()
    {
        return $this->belongsTo(Categories::class, "category_id", "id");
    }

    public function likes()
    {
        return $this->hasMany(Likes::class, "gif_id", "id");
    }
    
    public function reports()
    {
        return $this->hasMany(Reports::class, "gif_id", "id");
    }

    public function views()
    {
        return $this->hasMany(Views::class, "gif_id", "id");
    }
}
