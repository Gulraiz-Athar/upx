<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Quoteinquirty extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $email;
    public $adminname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $email, $adminname)
    {
        $this->data = $data;
        $this->email = $email;
        $this->name = $adminname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('upx.mailtemplate.inquiry')
                    ->from($this->email)
                    ->subject('New inquiry')
                    ->with($this->data, $this->name);
    }
}
