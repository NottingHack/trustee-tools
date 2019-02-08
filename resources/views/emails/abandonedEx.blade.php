@component('mail::message')
Dear {{ $firstname }}

**ACTION REQUIRED BY YOU**

You have been an ex-member of the Hackspace for {no. days an ex-member}, we're sorry to see you go, but would ask you to remove your remaining items from the space to make room for other member storage, current projects and Hackspace renovation work.

An audit of sheet storage items has been carried out and we have found the following with your name on:


@foreach ($items as $item)
* {{ $item }}
@endforeach

**PLEASE REMOVE YOUR ITEMS BEFORE THE 6TH of MARCH.**

Any materials remaining after this date will be considered a donation to the Hackspace.

Items can be reclaimed on Tuesday or Wednesday evenings, during the Hack-the-Space weekend (8-10 Feb) or by contacting the trustees to arrange collection.

Kind regards,<br>
Nottingham Hackspace Trustees
@endcomponent
