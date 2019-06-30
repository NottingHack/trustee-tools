<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\HMSModels\Members;
use Illuminate\Bus\Queueable;
use App\HMSModels\SnackspaceDebt;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SnackspaceDebtJob //implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $snackspaceDebt = new SnackspaceDebt();
        $snackspaceDebt->audit_time = Carbon::now();
        $snackspaceDebt->total_debt = Members::where('balance', '<', 0)->sum('balance');
        $snackspaceDebt->current_debt = Members::where('balance', '<', 0)
            ->where('member_status', '5')
            ->sum('balance');
        $snackspaceDebt->ex_debt = Members::where('balance', '<', 0)
            ->where('member_status', 6)
            ->sum('balance');

        $snackspaceDebt->total_credit = Members::where('balance', '>', 0)->sum('balance');
        $snackspaceDebt->current_credit = Members::where('balance', '>', 0)
            ->where('member_status', '5')
            ->sum('balance');
        $snackspaceDebt->ex_credit = Members::where('balance', '>', 0)
            ->where('member_status', 6)
            ->sum('balance');

        $snackspaceDebt->save();

        Log::info(
            'TotalDebt: £' . $snackspaceDebt->total_debt/100
            . ', Current: £' . $snackspaceDebt->current_debt/100
            . ', Ex: £' . $snackspaceDebt->ex_debt/100
        );
        Log::info(
            'TotalCredit: £' . $snackspaceDebt->total_credit/100
            . ', Current: £' . $snackspaceDebt->current_credit/100
            . ', Ex: £' . $snackspaceDebt->ex_credit/100
        );
    }
}
