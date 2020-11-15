<?php

namespace App\Http\Controllers;

use App\Dto\FormMessage;
use App\Mail\SendFormMessage;
use App\Models\Contacts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactsController extends Controller
{

    const MAIL_TOKEN = "41e8091d45dda7e0dbc6edc8168b8795";

    public function index()
    {
        $contacts = Contacts::all()->first();

        return view('contacts', ["contacts" =>$contacts]);
    }

    public function sendMessage(Request $request)
    {
        $formData = $request->all();
        if (!isset($formData["hash"]) || $formData["hash"] != self::MAIL_TOKEN){
            return new Response(["message" => "Error message body"],401);
        }
        $formMessage = new FormMessage();
        $formMessage->name = $formData["name"];
        $formMessage->email = $formData['email'];
        $formMessage->phone = $formData["phone"];
        $formMessage->message = $formData["message"];

        Mail::send(new SendFormMessage($formMessage));

        return new Response(["message" => "Message send"],200);
    }
}
