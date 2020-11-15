<?php


namespace App\Http\Controllers;


use App\Repositories\PricesRepository;

class PricesController extends Controller
{
    /**
     * @var PricesRepository
     */
    private $pricesRepository;

    public function __construct(PricesRepository $pricesRepository)
    {
        $this->pricesRepository = $pricesRepository;
    }

    public function index()
    {
        $prices = $this->pricesRepository->all();
//        dd($prices);

        return view('prices', ["prices" => $prices]);
    }

}
