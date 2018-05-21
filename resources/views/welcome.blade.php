@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to Nottingham Hackspace Trustee Resources!</h2>
    <p>Fromo here you can do the following tasks</p>
    <ul>
        <li><a href={{ route('trustees.email-members.draft') }}>Send Email to all current members</a></li>
        <li>Download CSV of Member Names and emails for use with OPA Vote</li>
    </ul>
</div>
@endsection