<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'text',
        'image',
        'secondary_image',
        'active'
    ];
}