@extends('layouts.panel')

@section('panel-heading')
データ追加（重複時は、個数分送信してください）
@endsection

@section('panel-body')
<form method="POST"
      action="add-data/post"
      class="form-horiyzontal">
  {{ csrf_field() }}

  @include('partials.mission-selector')

  <!-- TODO ふやす -->
  @include('partials.material-selector')

<button type="submit" class="btn btn-primary">送信</button>
</form>

@endsection

@section('scripts-tail')
<script src="{{ asset('js/material-selector.js') }}"></script>
@endsection
