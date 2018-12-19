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
     * Should this only sent as a test.
     * @var bool
     */
    public $testSend;

    /**
     * Create a new event instance.
     *
     * @param string $subject The email subject.
     * @param string $htmlContent The email content as text/html.
     * @param bool $testSend Should this only sent as a test.
     */
    public function __construct(string $subject, string $htmlContent, bool $testSend = True)
    {
        $this->subject = $subject;
        $this->htmlContent = $htmlContent;
        $this->testSend = $testSend;
    }
}
