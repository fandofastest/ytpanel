<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
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

    function covtime($youtube_time) {
        preg_match_all('/(\d+)/',$youtube_time,$parts);
    
        // Put in zeros if we have less than 3 numbers.
        if (count($parts[0]) == 1) {
            array_unshift($parts[0], "0", "0");
        } elseif (count($parts[0]) == 2) {
            array_unshift($parts[0], "0");
        }
    
        $sec_init = $parts[0][2];
        $seconds = $sec_init%60;
        $seconds_overflow = floor($sec_init/60);
    
        $min_init = $parts[0][1] + $seconds_overflow;
        $minutes = ($min_init)%60;
        $minutes_overflow = floor(($min_init)/60);
    
        $hours = $parts[0][0] + $minutes_overflow;
    
        if($hours != 0){
            if ($seconds<10) {
                $seconds='0'.$seconds;
                # code...
            }
            return $minutes.':'.$seconds;
        }     
        else {
            if ($seconds<10) {
                $seconds='0'.$seconds;
                # code...
            }
            return $minutes.':'.$seconds;

        }
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
        $api='AIzaSyAgX-SRZsa_ed__aLBix07h4oxgwQXoqPU';
        $url='https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$request->videoid.'&key='.$api;
        // dd($url);
        $response = Http::get($url);
        $responseBody = json_decode($response->getBody());
        $video = new Video();

        //  dd($responseBody->items);       

         foreach ($responseBody->items as $data) {
            // dd($data->snippet->title);
            $video->title=$data->snippet->title;    
            $video->description=$data->snippet->description;    
            $video->duration=$this->covtime($data->contentDetails->duration);;    

             # code...
         }
        $video->videoid=$request->videoid;    
        $video->playlistid=$request->playlistid;    

        $video->save();   




        // $playlist = Video::create($request->all());

        return redirect()->route('playlist.detail',$request->playlistid);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    
            $post = Video::find($id); 
            $post->delete();

          return  redirect()->back();
        
    }
}
