<?php


namespace App\Repositories;

use App\Models\SliderMedia;

class SliderMediaRepository extends AbstractRepository {

    public function __construct(SliderMedia $model)
    {
        parent::__construct($model);
    }
}
