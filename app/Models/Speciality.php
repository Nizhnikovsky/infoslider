<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = "specialities";

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}
