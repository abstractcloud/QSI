<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;
use App\User;
use File;
use Image;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(User $user)
    {
        return view('profile.setting', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    { 
        $userId = Auth::id();
        $user = User::findOrFail($userId);
            
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:6',
            'birthday' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'photo' => 'mimes:jpeg,jpg'
        ]);
        

        $user->fill([
            'name' => $request->name,
            'email' => $request->email
        ]);
        
        $user->profile->fill([
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'age' => $request->age,
            'gender' => $request->gender,
            'photo' => $request->photo
        ]);
        
        
		 if(!empty($user->profile['photo'])){
            $file = $request->file('photo');
            $hash = md5(microtime());
            $fileName = $hash . $file->getClientOriginalName();
            $file->move('img', $fileName);
            $user->profile['photo'] = $fileName;
        }
            
        $user->save();
        $user->profile->save();
        
        return redirect()->route('users.show', [
            'user' => $user
        ]);
    }
}
