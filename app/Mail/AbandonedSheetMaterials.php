<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AbandonedSheetMaterials extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;

    public $items;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname, $items)
    {
        $this->firstname = $firstname;
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('trustees@mg.nottinghack.org.uk', 'Nottingham Hackspace Trustees')
            ->replyTo('trustees@nottinghack.org.uk', 'Nottingham Hackspace Trustees')
            ->subject('Abandoned Sheet Materials')
            ->markdown('emails.abandonedCurrent');
    }
}
