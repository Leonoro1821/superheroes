<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    protected $fillable = [
        'real_name',
        'superhero_name',
        'photo_url',
        'additional_info',
    ];
}
