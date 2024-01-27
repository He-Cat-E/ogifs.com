<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    public function gifs()
    {
        return $this->hasMany(gifs::class, "category_id", "id");
    }
}
