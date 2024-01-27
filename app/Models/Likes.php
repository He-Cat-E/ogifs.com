<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $fillable = [
        'gif_id',
        // other fillable attributes...
        'user_id',
        // ... any other attributes you want to allow for mass assignment
    ];
}
