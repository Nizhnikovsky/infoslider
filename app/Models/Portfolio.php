<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {

    public function setImagesAttribute($value)
    {
        if (is_array($value)) {
            $value = json_encode($value);
        }

        $this->attributes['images'] = $value;
    }

    public function getImages()
    {
       return json_decode($this->attributes["images"], true);
    }

    public function getUriAttribute()
    {
       return "portfolio/".$this->attributes["slug"];
    }

    public function getImageAttribute()
    {
        $images = json_decode($this->attributes['images']);

        return "storage/".$images[0];
    }

    public function specialty()
    {
        return $this->belongsTo(Speciality::class, "speciality_id", "id");
    }
}
