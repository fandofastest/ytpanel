<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Country;
use App\Genre;
use App\Playlist;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


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


        $respons['data']=$data;

        return json_encode($respons);

    }


    public function getAllArtist()
    {
        //
        $data = Artist::all();
        // dd($data);


        $respons['data']=$data;

        return json_encode($respons);

    }

    public function getAllGenre()
    {
        //
        $data = Genre::all();


        // dd($data);

        $respons['data']=$data;

        return json_encode($respons);

    }

    public function getArtistbyCountry($id)
    {
        //
        $data = Artist::where('country', $id)->get();



        $respons['country']=$id;
        $respons['data']=$data;

        return json_encode($respons);

    }

    public function getAllCountry(){
        $api=User::first()->apikey;
        // dd($api);
        $url='https://youtube.googleapis.com/youtube/v3/i18nRegions?part=snippet&key='.$api;
        // dd($url);
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        $list['country']=[];
        foreach ($responseBody->items as $datas) {
            $country= new Country();

            $country->countryid=$datas->id;
            // dd($country->countryid);
            $country->name=$datas->snippet->name;
            $country->thumbnail=url('/thumbnail/country/').'/'.$datas->id.'.jpg';
            array_push($list['country'], $country);

            # code...
        }

        return json_encode($list);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchArtist($q){
        $data = Artist::where('name', $q)->orWhere('name', 'like', '%' . $q . '%')->get();
        $list['data']=$data;
        // dd($data);
        return json_encode($list);


    }

    public function getDurationByVideoId($videoid){
        $api=User::first()->apikey;
        $url='https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&key='.$api.'&id='.$videoid;

        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        foreach ($responseBody->items as $datas) {


            $video= new Video();
            $video->videoid=$datas->id;
            $video->title=$datas->snippet->title;
            $video->description=$datas->snippet->description;
            $video->duration=$datas->contentDetails->duration;
            $video->views=$datas->statistics->viewCount;
            $video->channelname=$datas->snippet->channelTitle;

        }


        return $video;




    }

    public function SearchByChannel($channelid){

        $api=User::first()->apikey;
        $url='https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&key='.$api.'&channelId='.$channelid;
        // dd($url);
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        $list['channel']=[];
        foreach ($responseBody->items as $datas) {

            if ($datas->id->kind=='youtube#video') {
                # code...
                $video=$this->getDurationByVideoId($datas->id->videoId);
                // dd($responseBody);
                array_push($list['channel'], $video);
            }


            # code...
        }

        return json_encode($list);
    }


    public function SearchVideo($q){

        $api=User::first()->apikey;
        $url='https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&key='.$api.'&q='.$q;
        // dd($url);
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        $list['result']=[];
        foreach ($responseBody->items as $datas) {

            if ($datas->id->kind=='youtube#video') {
                # code...
                $video=$this->getDurationByVideoId($datas->id->videoId);
                // dd($responseBody);
                array_push($list['result'], $video);
            }


            # code...
        }

        return json_encode($list);
    }




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
