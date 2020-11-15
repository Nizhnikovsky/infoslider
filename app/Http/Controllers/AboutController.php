<?php

namespace App\Http\Controllers;

use App\Repositories\ContactsRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function __construct(ContactsRepository $contactsRepository)
    {

    }

    public function index()
    {
        return view('about');
    }
}
