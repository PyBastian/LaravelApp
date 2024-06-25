<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ImportResultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $message = 'exito';

    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.import_result')
                    ->subject('Import Result') // Set the subject of the email
                    ->with([
                        'status' => $this->status,
                        'message' => $this->message,
                    ]);
    }
}
