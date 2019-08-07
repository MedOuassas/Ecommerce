<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slides";
    protected $fillable = [
        'title',
        'description',
        'photo',
        'url',
        'status'
    ];
}
