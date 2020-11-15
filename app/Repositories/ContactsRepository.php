<?php


namespace App\Repositories;


use App\Models\Contacts;

class ContactsRepository extends AbstractRepository {

    public function __construct(Contacts $model)
    {
        parent::__construct($model);
    }
}
