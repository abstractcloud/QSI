<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
        $id=DB::table('galleries')->where('user_id',$user_id)->first()->id;
        return redirect()->route('gallery.show',[
            'gallery_id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data=$request->all();
        $request->validate([
        'name' => 'required|unique:galleries|max:255',
        ]);
        $data['user_id']=Auth::id();
        $gallery=Gallery::create($data);
        return redirect()->route('gallery.show',['gallery_id'=>$gallery->id]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $galleries=DB::table('galleries')->where('user_id',$gallery['user_id'])->get();
        $photos=DB::table('photos')->where('gallery_id',$gallery['id'])->get();
        $count=DB::table('photos')->where('gallery_id',$gallery['id'])->count();
        return view ('profile.gallery',[
            'photos'=>$photos,
            'galleries'=>$galleries,
            'gallery'=>$gallery,
            'count'=>$count
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $data=$request->all();
        $request->validate([
        'name' => 'required|unique:galleries|max:255',
        ]);
        $gallery=Gallery::find($id);
        $gallery->update($data);
        return redirect()->route('gallery.show',[
            'gallery_id'=>$gallery->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        
          if(!empty($gallery)){
            $gallery->delete();
        }
        $user_id=Auth::id();
        $id=DB::table('galleries')->where('user_id',$user_id)->first()->id;
        return redirect()->route('gallery.show',[
            'gallery_id'=>$id]);
    }
}
