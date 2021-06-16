<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use App\Playlist;
use App\Video;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd('this is api ');
    }
    public function all()
    {
        //
        $data=Video::all();

        $respons['name']='allvideos';
        $respons['data']=$data;

        return json_encode($respons);
    }
    
    
    public function getVideosByPlaylist($playlistid)
    {
        //
        $data = Video::where('playlistid', $playlistid)->where('type','playlist')->get();
        $name = Playlist::where('id', $playlistid)->first();
        // dd($data);

       
        $respons['name']=$name->name;
        $respons['data']=$data;

        return json_encode($respons);
       
    }

    public function getVideosByGenre($genreid)
    {
        //
        $data = Video::where('playlistid', $genreid)->where('type','genre')->get();
        $name = Genre::where('id', $genreid)->first();
        // dd($data);

       
        $respons['name']=$name->name;
        $respons['data']=$data;

        return json_encode($respons);
       
    }

    public function getAllPlaylist()
    {
        //
        $data = Playlist::all();
        // dd($data);


        return $data->toJson(JSON_PRETTY_PRINT);
       
    }


    public function getAllArtist()
    {
        //
        $data = Artist::all();
        // dd($data);


        return $data->toJson(JSON_PRETTY_PRINT);
       
    }

    public function getAllGenre()
    {
        //
        $data = Genre::all();
        // dd($data);


        return $data->toJson(JSON_PRETTY_PRINT);
       
    }

    public function getArtistbyCountry($id)
    {
        //
        $data = Artist::where('country', $id)->get();


       
        $respons['country']=$id;
        $respons['data']=$data;

        return json_encode($respons);
       
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
        //
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
    public function destroy($id)
    {
        //
    }
}
