<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Support\Facades\Auth;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with('images','user','comments')->paginate(10);

        return response()->json($galleries);
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
    public function store(StoreGalleryRequest $request)
    {
        $data = $request->validated();

        $gallery = new Gallery;
        $gallery->title = $data['title'];
        $gallery->descrtiption = $data['descrtiption'];
        $gallery->user()->associate(Auth::user());
        $gallery->save();

        $image = new Image;
        $image->Image_Url = $data['Image_Url'];
        $image->gallery()->associate($gallery);
        $image->save();

        
        

        return response()->json($gallery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('images', 'user','comments');

        return response()->json($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery, Image $images)
    {
        $data = $request->validated();

        
        $image = $data['Image_Url'];

        
        
        $gallery->update($data);

        $image = Image::where('gallery_id', $gallery->id)->update(array('Image_Url' => $image));


        //$images->update($image)->where(['gallery_id'=> $gallery->id]);

        //$images = Image::create(['gallery_id'=> $gallery->id,'Image_Url' => $image]);

        //$images->update(['gallery_id'=> $gallery->id,'Image_Url' => $image]);

        info($images);

        return response()->json($gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return response()->noContent();

    }

    public function getMyGalleries($user_id) 
    {
        $galleries = Gallery::with('images')->where('user_id',$user_id)->get();

        return response()->json($galleries);
    }
}
