<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SliderVideo extends Model
{

    public function getVideoAttribute($value)
    {
        $videos = json_decode($this->attributes['video_uri'], true);

        return $videos[0]["download_link"]??null;
    }
}
