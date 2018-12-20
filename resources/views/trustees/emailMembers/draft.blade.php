@extends('layouts.app')

@push('scripts')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script src="https://unpkg.com/docs-soap@1.2.0/dist/docs-soap.min.js"></script>
  <script>
    $(document).ready(function() {
      var docsSoap = window.docsSoap.default;
      $('#emailContent').summernote({
        callbacks: {
          onPaste: function(e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');
            var clean = docsSoap(bufferText);
            clean = clean.replace(/<\/p><br><p>/gm, '</p><p>');
            clean = clean.replace(/<li><p>/gm, '<li>');
            clean = clean.replace(/<\/p><\/li>/gm, '</li>');
            clean = clean.replace(/<\/?body>/gm, '');
            clean = clean.replace(/<br class=.*?>/gm, '');
            clean = clean.replace(/(<br>)+$/, '');
            e.preventDefault();
            // Firefox fix
            setTimeout(function () {
                window.document.execCommand('insertHtml', false, clean);
            }, 10);
          }
        }
      });
    });
  </script>
@endpush

@section('pageTitle', 'Email to members')

@section('content')
<div class="container">
  <p>Use the form below to darft an email to all members</p>
  <p>Note the formating template will add "Hello name", at the top and "This email was sent to you as a current member of Nottingham Hackspace" as a footer</p>
  <form class="form-group" id="tustesse-emailMembers-draft-from" role="form" method="POST" action="{{  route('trustees.email-members.review') }}">
    @csrf

    <div class="form-group">
      <label for="subject" class="form-label">Subject</label>
      <input id="subject" class="form-control" type="text" name="subject" value="{{ old('subject', $subject) }}" required autofocus>
      @if ($errors->has('subject'))
      <span class="help-block">
        <strong>{{ $errors->first('subject') }}</strong>
      </span>
      @endif
    </div>

    <div class="form-group">
      <label for="emailContent" class="form-label">Content</label>
      <textarea id="emailContent" name="emailContent" class="form-control" rows="10" required>{{ old('emailContent', $emailContent) }}</textarea>
      @if ($errors->has('emailContent'))
      <p class="help-text">
        <strong>{{ $errors->first('emailContent') }}</strong>
      </p>
      @endif
    </div>

    <div class="form-group">
      <div class="card">
        <button type="submit" class="btn btn-primary">
          Review email
        </button>
      </div>
    </div>
  </form>
</div>
@endsection
