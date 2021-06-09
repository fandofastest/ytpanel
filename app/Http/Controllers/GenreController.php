<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Genre::all();
        // dd($data);
        return view('pages.genre', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('pages.genre_add');
        return redirect()->route('genre.index');

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
        $file = $request->file('file');
        
                $tujuan_upload = 'thumbnail';
                    // upload file
                $file->move($tujuan_upload,$request->name.'.'.$file->getClientOriginalExtension());

                $genre = new Genre();
                $genre->name=$request->name;
                $genre->thumbnail=$request->name.'.'.$file->getClientOriginalExtension();
                $genre->save();
        

                return redirect()->route('genre.index');
         
                
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gr = DB::table('genres')->where('id', $id)->first();
        // dd($pl);
        $data=DB::table('videos')->where('playlistid', $id)->where('type','genre')->get();
        return view('pages.genre_detail', ['genre' => $gr,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Genre::find($id); 
        $post->delete();

      return  redirect()->back();
    }
}
