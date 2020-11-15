<?php


namespace App\Repositories;


use App\Models\Prices;

class PricesRepository extends AbstractRepository
{

    public function __construct(Prices $model)
    {
        parent::__construct($model);
    }

}
