<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;
use File;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   //
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
        $photo = $request->all();
        
        $request->validate([
            'title' => 'required|max:255',
            'img'=> 'required|mimes:jpeg'
        ]);

        if(!empty($photo['img'])){
            $file = $request->file('img');
            $hash = md5(microtime());
            $fileName = $hash.$file->getClientOriginalName();
            $file->move('uploads/photos/img',$fileName);
            
            $img = Image::make('uploads/photos/img/' . $fileName);
            $img->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            
            $img->save('uploads/photos/preview/' . $fileName);
            
            $photo['img'] = $fileName;
        }

        Photo::create($photo);

        return redirect()->route('gallery.show',[
            'id' => $photo['gallery_id']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if(!empty($photo)){
            $id=$photo['gallery_id'];
            $photo->delete();
        }
        return redirect()->route('gallery.show',[
            'gallery_id'=>$id]);
    }
}
