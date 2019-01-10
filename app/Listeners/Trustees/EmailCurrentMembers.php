<?php

namespace App\Listeners\Trustees;

use Html2Text\Html2Text;
use App\HMSModels\Members;
use Illuminate\Support\HtmlString;
use Bogardo\Mailgun\Contracts\Mailgun;
use App\Mail\Trustees\ToCurrentMembers;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Trustees\EmailToCurrentMembers;
use Illuminate\Contracts\View\Factory as ViewFactory;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;


class EmailCurrentMembers implements ShouldQueue
{
    /**
     * @var Mailgun
     */
    protected $mailgun;

    /**
     * @var CssToInlineStyles
     */
    protected $cssToInlineStyles;

    /**
     * @var ViewFactory
     */
    protected $viewFactory;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailgun $mailgun,
        CssToInlineStyles $cssToInlineStyles,
        ViewFactory $viewFactory)
    {
        $this->mailgun = $mailgun;
        $this->cssToInlineStyles = $cssToInlineStyles;
        $this->viewFactory = $viewFactory;
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
        $views = ['html' => 'emails.trustees.toCurrentMembers_mailgun', 'text' => 'emails.trustees.toCurrentMembers_plain'];

        $emailView = new ToCurrentMembers($event->subject, $event->htmlContent);
        $renderedHtml = $emailView->render();
        $renderedHtmlCSS = new HtmlString($this->cssToInlineStyles->convert($renderedHtml, $this->viewFactory->make('vendor.mail.html.themes.default')->render()));

        $data = [
            'htmlContent' => $renderedHtmlCSS,
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
            $message
                ->trackOpens(true)
                ->subject($event->subject)
                ->header('sender', 'Nottingham Hackspace Trustees <trustees@mg.nottinghack.org.uk>')
                ->replyTo('trustees@nottinghack.org.uk', 'Nottingham Hackspace Trustees')
                ->from('trustees@mg.nottinghack.org.uk', 'Nottingham Hackspace Trustees')
                ->to($to);
        });
    }
}
