<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    protected $fillable = ['tags', 'gif_id'];

    public function posts()
    {
        return $this->belongsTo(gifs::class, "gif_id", "id")->with("userInfo", "likes", "tags");
    }
}
