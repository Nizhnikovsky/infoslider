<?php

namespace App\Http\Controllers;

use App\Repositories\PortfolioRepository;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $portfolioRepository;

    public function __construct(PortfolioRepository $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    public function index()
    {
        $pages = $this->portfolioRepository->all();

        return view('portfolio',["pages" => $pages]);
    }

    public function show(Request $request)
    {
        $portfolioSlug = $request->route("slug");
        $portfolio = $this->portfolioRepository->getPortfolioBySlug($portfolioSlug);

        return view('portfolio_single',["portfolio" => $portfolio]);
    }
}
