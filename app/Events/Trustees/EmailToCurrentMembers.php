<?php

namespace App\Events\Trustees;

use Illuminate\Queue\SerializesModels;

class EmailToCurrentMembers
{
    use SerializesModels;

    /**
     * The email subject.
     * @var string
     */
    public $subject;

    /**
     * The email content as text/html.
     * @var string
     */
    public $htmlContent;

    /**
     * Create a new event instance.
     *
     * @param string $subject The email subject.
     * @param string $htmlContent The email content as text/html.
     */
    public function __construct(string $subject, string $htmlContent)
    {   
        $this->subject = $subject;
        $this->htmlContent = $htmlContent;
    }
}
