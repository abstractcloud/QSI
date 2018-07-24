<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Friends extends Model
{
    protected $table = 'friends';
    public $timestamps = false;
    
    protected $guarded = [''];
    protected $fillable = ['name', 'preview'];
    
    
    
    public static function searchFriendName($name)
    {
          $searchFriend = DB::table('users')
            ->leftJoin('friends', 'friends.friend_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%'.$name.'%')
            ->get();
            
        return $searchFriend;
    }
}
