<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'name',
        'thumbnail',
    ];

    public function getThumbnailAttribute($value)
    {
        return url('/thumbnail/').'/'.$value;
    }
}
