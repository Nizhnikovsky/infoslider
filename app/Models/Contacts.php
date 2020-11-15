<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Contacts extends Model {
    use Spatial;

    public static function getContacts()
    {
        return self::all()->first();
    }
}
