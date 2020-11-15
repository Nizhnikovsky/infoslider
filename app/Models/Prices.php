<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'prices';
    protected $fillable = [
        'id',
        'title',
        'description',
        'price'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
