@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to Nottingham Hackspace Trustee Resources!</h2>
    <p>Fromo here you can do the following tasks</p>
    <ul>
        <li><a href="{{ route('trustees.email-members.draft') }}">Send Email to all current members</a></li>
        <li><a href="{{ route('trustees.opa-csv') }}" target="_blank">Download CSV of Member emails for use with OPA Vote</a></li>
        <li><a href="{{ route('snackspace.debt') }}">View Snackspace debt graph</a></li>
        <li><a href="{{ route('trustees.low-payers') }}" target="_blank">Download CSV of Low Payers</a></li>
    </ul>
</div>
@endsection
