<?php

namespace App\Listeners\Trustees;

use Html2Text\Html2Text;
use App\HMSModels\Members;
use Bogardo\Mailgun\Contracts\Mailgun;
use App\Mail\Trustees\ToCurrentMembers;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Trustees\EmailToCurrentMembers;

class EmailCurrentMembers implements ShouldQueue
{
    /**
     * @var Mailgun
     */
    protected $mailgun;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailgun $mailgun)
    {
        $this->mailgun = $mailgun;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmailToCurrentMembers $event)
    {
        $currentMembers = Members::where('member_status', 5)
            ->where('member_id', '!=', 778)
            ->where('member_id', '!=', 3033)
            ->get();

        // Send using Mailgun
        $views = ['html' => 'emails.trustees.toCurrentMembers', 'text' => 'emails.trustees.toCurrentMembers_plain'];
        $data = [
            'htmlContent' => $event->htmlContent,
            'textPlain' => Html2Text::convert($event->htmlContent),
        ];

        if ($event->testSend) {
            // only send to the trustees address
            $to = [
                'trustees@nottinghack.org.uk' => [
                    'name' => 'Trustees',
                ]
            ];
        } else {
            // send to all current members
            $to = $currentMembers->mapWithKeys(function ($user) {
                return [ $user->email =>
                            [
                                'name' => $user->firstname,
                            ]
                        ];
            })->toArray();
        }

        $this->mailgun->send($views, $data, function ($message) use($event, $to) {
            dump($to);
            $message
                ->subject($event->subject)
                ->from('trustees@nottinghack.org.uk', 'Nottingham Hackspace Trustees')
                ->to($to);
        });
    }
}
