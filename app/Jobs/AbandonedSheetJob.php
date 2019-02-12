<?php

namespace App\Jobs;

use App\HMSModels\Members;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\AbandonedSheetMaterials;
use Illuminate\Queue\SerializesModels;
use App\Mail\AbandonedSheetMaterialsEx;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AbandonedSheetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $members = [
        '907' => ['Plywood and Arcylic laser bits in kitronik envelope'],
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
        foreach ($this->members as $member_id => $items) {
            $member = Members::where('member_id', $member_id)
                ->first();
            if ($member != null) {
                $to = [['email' => $member->email, 'name' => $member->firstname . ' ' . $member->surname]];


                if ($member->member_status == 5) {
                    dump("current");
                    dump($to);
                    Mail::to($to)->send(new AbandonedSheetMaterials($member->firstname, $items));
                } elseif ($member->member_status == 6) {
                    dump($to);
                    dump("ex");
                    Mail::to($to)->send(new AbandonedSheetMaterialsEx($member->firstname, $items));
                }
            } else {
                dump('not found');
            }
        }
    }
}
