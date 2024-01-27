<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteUsers extends Model
{
    use HasFactory;

    public function gifs()
    {
        return $this->hasMany(gifs::class, "user_id", "id");
    }

    public function followers()
    {
        return $this->hasMany(Followers::class, "follow_id", "id");
    }

    public function following()
    {
        return $this->hasMany(Followers::class, "follower_id", "id");
    }

}
