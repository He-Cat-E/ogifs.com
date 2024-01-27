<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;

    protected $fillable = [
        'gif_id',
        // other fillable attributes...
        'ip_address',
        // ... any other attributes you want to allow for mass assignment
    ];
}
