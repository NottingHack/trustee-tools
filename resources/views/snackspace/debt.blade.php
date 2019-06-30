@extends('layouts.app')

@section('pageTitle', 'Snackspace Debt')

@section('content')
<div class="container">
  {!! $chart->container() !!}
</div>
@endsection

@push('scripts')
  {!! $chart->script() !!}
@endpush
