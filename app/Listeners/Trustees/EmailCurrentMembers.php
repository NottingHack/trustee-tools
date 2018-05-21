<?php

namespace App\Listeners\Trustees;

use Html2Text\Html2Text;
use App\HMSModels\Members;
use App\Mail\Trustees\ToCurrentMembers;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Trustees\EmailToCurrentMembers;

class EmailCurrentMembers implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $bcc = $currentMembers->map(function ($user) {
            return [
                    'address' => $user->email,
                    'name' => $user->firstname,
                    ];
        })->toArray();


        // Send using a Mailable 
        $mail = \Mail::to('trustees@nottinghack.org.uk', 'Nottingham Hackspace Trustees')
            // ->bcc($currentMembers)
            ->send(new ToCurrentMembers($event->subject, $event->htmlContent));
        
        // Build the message with out a view and send
        // generate a plain text version of the html
        // $textPlain = Html2Text::convert($event->htmlContent);    

        // add html wraping
        
        // $data = [
        //     'from' => [
        //         'address' => 'trustees@nottinghack.org.uk',
        //         'name' => 'Nottingham Hackspace Trustees',
        //     ],
        //     'to' => 'members@mg.nottinghack.org.uk',
        //     'subject' => $event->subject,
        //     'htmlContent' => $event->htmlContent,
        //     'textPlain' => $textPlain,
        //     ];

        // \Mail::send([], [], function($message) use ($data) {
        //     $message->from($data['from']['address'], $data['from']['name']);
        //     $message->to($data['to']);
        //     $message->subject($data['subject']);
        //     $message->setBody($data['htmlContent'], 'text/html');
        //     $message->addPart($data['textPlain'], 'text/plain');
        // });
    }
}
