<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use App\Mail\Teams\TeamReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EmailTeamReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Teams to email.
     * @var array
     */
    protected $teams = [
        "3D Printing Team" => "3dprinting@nottinghack.org.uk",
//        "Finance Team" => "accounts@nottinghack.org.uk",
        "Communications Team" => "comms@nottinghack.org.uk",
        "Craft Team" => "craft@nottinghack.org.uk",
        "Electronics Team" => "electronics@nottinghack.org.uk",
        "Events Team" => "events@nottinghack.org.uk",
        "Fundraising Team" => "fundraising@nottinghack.org.uk",
        "Infrastructure Team" => "infrastructure@nottinghack.org.uk",
        "Laser Team" => "laser@nottinghack.org.uk",
        "Maintainers Team" => "maintainers@nottinghack.org.uk",
        "Membership Team" => "membership@nottinghack.org.uk",
        "Metalworking Team" => "metalworking@nottinghack.org.uk",
        "Network Team" => "network@nottinghack.org.uk",
        "Rescouces Team" => "resources@nottinghack.org.uk",
        "Safety Team" => "safety@nottinghack.org.uk",
        "Snackspace Team" => "snackspace@nottinghack.org.uk",
        "Software Team" => "software@nottinghack.org.uk",
        "Tools Team" => "tools@nottinghack.org.uk",
        "Trustees" => "trustees@nottinghack.org.uk",
        "Woodworking Team" => "woodworking@nottinghack.org.uk",
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // first we need to check which tuesday this is
        $date = Carbon::now();
        if ($date->dayOfWeekIso != 2) {
            // not a Tuesday do nothing
            return;
        }

        if ($date->addDays(8)->day >= 8) {
            // not the Tuesday we want
            return;
        }

        foreach ($this->teams as $name => $email) {
            $to = [['email' => $email, 'name' => $name]];

            Mail::to($to)->send(new TeamReminder($name));
        }
    }
}
