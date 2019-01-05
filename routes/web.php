<?php

use App\HMSModels\Members;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Mail\Trustees\ToCurrentMembers;
use App\Events\Trustees\EmailToCurrentMembers;
use Illuminate\Contracts\View\Factory as ViewFactory;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('trustees');

Route::get('trustees/email-members', function () {
    $draft = \Cache::get('trustees.emailMembers.draft', [
        'subject' => '',
        'emailContent' => ''
    ]);

    return view('trustees.emailMembers.draft', $draft);
})->name('trustees.email-members.draft');

Route::post('trustees/email-members', function (Request $request) {
    \Cache::put('trustees.emailMembers.draft', [
        'subject' => $request->subject,
        'emailContent' => $request->emailContent,
    ], now()->addMinutes(30));

    $emailView = new ToCurrentMembers($request->subject, $request->emailContent);
    $renderedTextPlain = $emailView->renderText();

    $currentMemberCount = Members::where('member_status', 5)
        ->where('member_id', '!=', 778)
        ->where('member_id', '!=', 3033)
        ->count();

    return view('trustees.emailMembers.review')
        ->with([
            'subject' => $request->subject,
            'emailPlain' => $renderedTextPlain,
            'currentMemberCount' => $currentMemberCount,
        ]);
})->name('trustees.email-members.review');

Route::get('trustees/email-members/review', function (ViewFactory $viewFactory, CssToInlineStyles $cssToInlineStyles) {
    $draft = \Cache::get('trustees.emailMembers.draft', [
        'subject' => '',
        'emailContent' => ''
    ]);

    $emailView = new ToCurrentMembers($draft['subject'], $draft['emailContent']);
    $renderedHtml = $emailView->render();
    $renderedHtmlCSS = new HtmlString($cssToInlineStyles->convert($renderedHtml, $viewFactory->make('vendor.mail.html.themes.default')->render()));

    return response($renderedHtmlCSS);
})->name('trustees.email-members.preview');

Route::put('trustees/email-members', function (Request $request) {
    $draft = \Cache::get('trustees.emailMembers.draft');
    event(new EmailToCurrentMembers($draft['subject'], $draft['emailContent'], $request->testSend));
    if (! $request->testSend) {
        flash('Email queued for sending', 'success');
        \Cache::forget('trustees.emailMembers.draft');
    } else {
        flash('Test email queued for sending', 'success');
    }

    return redirect()->route('trustees.email-members.draft');
})->name('trustees.email-members.send');
