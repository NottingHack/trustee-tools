@component('mail::message')
Dear {{ $firstname }}

**ACTION REQUIRED BY YOU**

As you will hopefully be aware, unclaimed materials from the woodwork sheet storage area were moved to temporary storage downstairs after the 28th August 2018, awaiting retrieval from owners. In order to continue with the expansion of the downstairs areas, we now need to clear this temporary storage space and ask all members to reclaim and remove their items from this area.

An audit of the remaining items has been carried out and we have found the following with your name on:

@foreach ($items as $item)
* {{ $item }}
@endforeach

**PLEASE REMOVE YOUR ITEMS BEFORE THE 6TH of MARCH.**

Any materials remaining after this date will be considered a donation to the Hackspace.

Items can be reclaimed on Tuesday or Wednesday evenings, during the Hack-the-Space weekend (8-10 Feb) or by contacting the trustees to arrange collection.

Kind regards,<br>
Nottingham Hackspace Trustees
@endcomponent
