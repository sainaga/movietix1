<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Image;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $genre = Genre::find($id);
        $screenings = $genre->screenings()->orderBy('id', 'desc')->get();
        return view('genres.index', compact('screenings', 'genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::orderBy('id', 'desc')->get();
         return view('genres.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
            Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/genres/'. $newfilename));
            $image = $newfilename;
        }
        $genre = Genre::create([
            'name' => request('name'),
            'image' => $image
        ]); 
         session()->flash('success', 'Genre Added ');
        return redirect()->back();
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
        $genre = Genre::find($id);
        $genres = Genre::orderBy('id', 'desc')->get();
         return view('genres.edit', compact('genres', 'genre'));
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
        $genre = Genre::find($id);
          if(Input::hasFile('image')){
            $file=Input::file('image');
            $dd = $file->getClientOriginalName();
            $file_basename = substr($dd, 0, strripos($dd, '.')); // get file name
            $file_ext = substr($dd, strripos($dd, '.')); // get file extension
            $t = date("i-s");
            $newfilename = md5($file_basename) . $t . $file_ext;
            Image::make($file)->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/genres/'. $newfilename));
            $image = $newfilename;
        }
         if ($request->name) $genre->name = $request->name;
       //  if (Input::hasFile('image') { 
         if (Input::hasFile('image')) { 
            $genre->image = $image;
        }
         $genre->save();
         session()->flash('success', 'Genre Updated ');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
