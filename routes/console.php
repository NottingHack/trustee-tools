<?php

use App\Jobs\AbandonedSheetJob;
use App\Jobs\EmailTeamReminder;
use App\Jobs\SnackspaceDebtJob;
use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('team-reminder', function () {
    EmailTeamReminder::dispatch();
});


Artisan::command('sheet', function () {
    AbandonedSheetJob::dispatch();
});

Artisan::command('snackspace', function () {
    SnackspaceDebtJob::dispatch();
});
