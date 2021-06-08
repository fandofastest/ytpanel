<?php

namespace App\Http\Controllers;

use App\Artist;
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
    
    
    public function getVideosByPlaylist($playlistid)
    {
        //
        $data = Video::where('playlistid', $playlistid)->get();
        // dd($data);


        return $data->toJson(JSON_PRETTY_PRINT);
       
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

    public function getArtistbyCountry($id)
    {
        //
        $data = Artist::where('country', $id)->get();
        // dd($data);


        return $data->toJson(JSON_PRETTY_PRINT);
       
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
