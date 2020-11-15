<?php

namespace App\Models;

class Page extends \TCG\Voyager\Models\Page {

    public function getImagesAttribute()
    {
        return json_decode($this->attributes['parameters']);
    }

    public function setImagesAttribute($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->attributes['parameters'] = $value;
    }

//    public function getImagesAttribute($value)
//    {
//        return $this->attributes['images'] = $this->separateString($value);
//    }

    public function getImageAttribute($value)
    {
        $images = $this->separateString($this->attributes['images']);

        return $images[0];
    }

    private function separateString(string $imagesString)
    {
        $imagesArray = explode(",",trim($imagesString,'[ ]'));
        $imagesArray = array_map(function ($item){
            return trim($item,'"');
        },$imagesArray);

        return $imagesArray;
    }
}
