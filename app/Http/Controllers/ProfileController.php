<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $name = $request->input('name');

        if(!empty($name)){
            $friends = Friends::searchFriendName($name);
        }else{
            $friends = Friends::all();
        }

        return view('profile.index',[
            'friends' => $friends,
        ]);
    }
}
