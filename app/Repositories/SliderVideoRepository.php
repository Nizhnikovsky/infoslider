<?php


namespace App\Repositories;


use App\Models\SliderVideo;

class SliderVideoRepository extends AbstractRepository
{
    public function __construct(SliderVideo $model)
    {
        parent::__construct($model);
    }
}
