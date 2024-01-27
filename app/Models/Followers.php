<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'follow_id',
        // other fillable attributes...
        'follower_id',
        // ... any other attributes you want to allow for mass assignment
    ];
}
