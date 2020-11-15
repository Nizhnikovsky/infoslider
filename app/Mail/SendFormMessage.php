<?php

namespace App\Mail;

use App\Dto\FormMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFormMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $formMessage;

    /**
     * Create a new message instance.
     *
     * @param FormMessage $message
     */
    public function __construct(FormMessage $message)
    {
        $this->formMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@infoslider.ru')
            ->to('nizhnikovsky89@gmail.com')
            ->view('mail.form_message')
            ->with([
                'name' => $this->formMessage->name,
                'email' => $this->formMessage->email,
                'phone' => $this->formMessage->phone,
                'dataMessage' => $this->formMessage->message
            ]);
    }
}
