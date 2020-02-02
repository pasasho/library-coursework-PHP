<?php

namespace App\Http\Controllers\admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUpload;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index()
    {
                $images = Image::all();

        return view('Images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   public function store(ImageUpload $request)
    {
        //$path = Storage::disk('local')->put($request->file('customImage')->getClientOriginalName(),$request->file('customImage')->get());
        $path = $request->file('customImage')->store('/public/sample-images');
        
        $image = new Image([
            'fileName' => basename($path),
            'imageDescription' => $request->get('imageDescription')
        ]);
        $image->save();


        return redirect('images');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $image = Image::find($id);

        return view('Images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'fileName'=>'required',
        'imageDescription'=>'required',
      ]);

      $image = Image::find($id);
      $image->image = $request->get('image');

      $image->save();

      return redirect('/images')->with('success', 'Image has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $image = Image::find($id);
        Storage::delete('public/sample-images/' . $image->fileName);
        $image->delete();

        return redirect('/images')->with('success', 'Image was deleted!');
    }
}
