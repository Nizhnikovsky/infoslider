<?php


namespace App\Repositories;


use App\Models\Page;

class PagesRepository extends AbstractRepository {

    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function getPageBySlug(string $slug)
    {
        return Page::where("slug",$slug)->first();
    }
}
