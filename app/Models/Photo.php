<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
     protected $guarded=[''];
    protected $fillable=['title','preview','img','gallery_id'];
}
