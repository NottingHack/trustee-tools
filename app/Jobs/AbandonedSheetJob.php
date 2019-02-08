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
        '145' => ['Perspex Sheets', 'Perspex Sheets'],
        '208' => ['New Box Project', 'New Box Project'],
        '52' => ['Plywood Folio with plywood inside'],
        '1858' => ['Laser Materials', 'Laser Materials'],
        '1537' => ['Plywood'],
        '966' => ['Plywood and Arcylic laser bits in kitronik envelope'],
        '561' => ['Large Kitronik', 'Kitronik Envelope', 'Door Molding', 'Chiltern Railways Acrylic Framing', ''],
        '1852' => ['Plywood Moldings', 'Cardboard Board Envelope'],
        '1732' => ['Cyborg Shoe'],
        '1640' => ['Acrylic'],
        '1675' => ['Large Kitronik'],
        '853' => ['3 small pieces of ply', 'Wood Strip Lengths', 'Black Acrylic Sheet'],
        '3468' => ['Wooden Table Top'],
        '3339' => ['Brown Envelope with oak?'],
        '140' => ['Large Kitronic with Perspex', 'Clear Acrylic Sheet', 'White Perspex x 2', 'Laser Materials', 'Laser Materials'],
        '877' => ['Large Kitronik'],
        '3237' => ['Gods Work'],
        '1218' => ['Small Piece of Ply x2'],
        '837' => ['Timber Post', 'Tatty plywood painted', 'Tatty melamine with polystyrene covering'],
        '823' => ['Perspex and Cardboard'],
        '762' => ['5mm Ply', 'Large Plywood with swirl shape cut out', 'Weave Studio Plywood laser'],
        '751' => ["Combi clock 'birdy'", 'Phone post and Pen Stand Jeremy Bartys', 'Dj Speakers x4'],
        '1992' => ['MDF Dance Pad x2'],
        '17' => ['Large Kitronik'],
        '11' => ['Cardboard'],
        '101' => ['Router Table'],
        '1611' => ['Magnetic Roll'],
        '1124' => ['RAS Table Material plywood'],
        '1434' => ['White Envelope'],
        '332' => ['Shoe Seat', 'Perspex sheet'],
        '1465' => ['Large Plywood Envelope', 'Large Plywood Envelope', 'Large envelope'],
        '2387' => ['Kitronik Plywood'],
        '620' => ['Acrylic'],
        '465' => ['Large Kitronik Envelope with clear perspex'],
        '576' => ['Plywood', 'Short plank of softwood'],
        '6' => ['Glow in the Dark Board'],
        '55' => ['The Dice Cup'],
        '1138' => ['Large Kitronik', 'Shoe Storage', 'Shoe Storage'],
        '2086' => ['V3 Turbine Bits'],
        '1590' => ['Arcade Pedestal x3', 'Arcade Pedestal'],
        '3129' => ['Prototype'],
        '1686' => ['Small envelope'],
        '1063' => ['Envelope with plywood'],
        '138' => ['Pikler Triangle'],
        '829' => ['Router Table'],
        '1468' => ['Desk', 'Inter-Dimensional Portal Stabiliser'],
        '142' => ['Sams Bed'],
        '2503' => ['Holywood Mirror'],
        '2575' => ['Whiteboard / Composite Pine Board / Hardboard with stripes'],
        '320' => ['Lazer Box'],
        '775' => ['Large Kitronik'],
        '1467' => ['Coffee Table', 'DVD Shelf', 'Plallet bits', 'Side Panel', ''],
        '3868' => ['Tabletop x2'],
        '1288' => ['2 short planks of pine'],
        '190' => ['Table Leg'],
        '440' => ['Large Kitronik PDWH'],
        '1757' => ['Plywood Board'],
        '1065' => ['Envelope with plywood'],
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
