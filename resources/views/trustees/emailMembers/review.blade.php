@extends('layouts.app')


@section('content')
<div class="container">
  <p>Please review the email before hitting send</p>
  <div class="card">
    <div class="card-header">{{ $subject }}</div>
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="html-tab" data-toggle="tab" href="#html" role="tab" aria-controls="html" aria-selected="true">HTML</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="plain-tab" data-toggle="tab" href="#plain" role="tab" aria-controls="plain" aria-selected="false">Text</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active" id="html" role="tabpanel" aria-labelledby="html-tab">
          {!! $emailContent !!}
        </div>
        <div class="tab-pane" id="plain" role="tabpanel" aria-labelledby="plain-tab">
          <pre style="word-wrap: break-word; white-space: pre-wrap;">{!! $emailPlain !!}</pre>
        </div>
      </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary btn-sm btn-sm-spacing" href={{ route('trustees.email-members.draft') }}>Edit</a>
        <a class="btn btn-primary btn-sm btn-sm-spacing" href="javascript:void(0);" onclick="$(this).find('form').submit();" >
          <form action="{{ route('trustees.email-members.send') }}" method="POST" style="display: none">
            @csrf
            @method('put')
          </form>Send
        </a>
    </div>
  </div>
</div>
@endsection