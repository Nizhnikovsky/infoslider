<?php


namespace App\Repositories;


use App\Models\Portfolio;

class PortfolioRepository extends AbstractRepository {

    const PUBLISHED = 'PUBLISHED';
    const DRAFT = 'DRAFT';
    const PENDING = 'PENDING';

    public function __construct(Portfolio $model)
    {
        parent::__construct($model);
    }

    public function getPortfolioBySlug(string $slug)
    {
        return Portfolio::where("slug",$slug)->first();
    }

    public function getAll()
    {
        return Portfolio::with('specialty')->get();
    }

    public function getPublishedPortfolios()
    {
        return Portfolio::where('status', '=', self::PUBLISHED)->orderBy('created_at', 'desc')->get();
    }
}
