<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_id',
        'movie_name',
        'movie_image',
        'movie_rating',
        'publish_status',
        'description'
    ];
}
