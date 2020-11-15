<?php


namespace App\Transformers;


use Illuminate\Support\Collection;

class PortfolioWithCategoriesTransformer
{

    public static function transformPortfolios(Collection $portfolioCollection)
    {
        $data = [];
        foreach ($portfolioCollection as $item){
            $data[$item->specialty->name] = $item;
        }


        $tt = $portfolioCollection->map(function ($item, $key){
            dd($item->specialty->name);
            return $item;
        });
        dd($tt);
    }
}
