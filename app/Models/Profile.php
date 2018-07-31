<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [''];
	protected $fillabel = ['phone', 'birthday', 'age', 'gender', 'photo', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}

