<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'id',
        'videoid',
        'title',
        'description',
        'playlistid',
        'duration',
        'views',
        'channelname',
        'type',
    ];
}
