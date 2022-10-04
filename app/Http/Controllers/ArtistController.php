<?php

namespace App\Http\Controllers;
use App\User;

use App\Artist;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Artist::all();
        // dd($data);
        return view('pages.artist', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        $api=User::first()->apikey;
        $url='https://youtube.googleapis.com/youtube/v3/i18nRegions?part=snippet&key='.$api;
        // dd($url);
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        return view('pages.artist_add',['data' => $responseBody]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $api=User::first()->apikey;
        $id=$request->channelid;
        $url='https://youtube.googleapis.com/youtube/v3/channels?part=snippet&id='.$id.'&key='.$api;
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        // $playlist = Artist::create($request->all());
        // dd($responseBody);

         $artist= new Artist();
        foreach ($responseBody->items as $data) {
               $artist->channelid=$data->id;
               $artist->country=$request->country;
               $artist->name=$data->snippet->title;
               $artist->description=$data->snippet->description;
               $artist->thumbnails=$data->snippet->thumbnails->default->url;
               $artist->save();
            # code...
        }


        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
