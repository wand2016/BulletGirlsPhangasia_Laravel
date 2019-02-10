@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      {{-- メッセージ --}}
      @if (Session::has('message'))
      <div class="alert alert-{{
                  session('is_error', false) ? 'danger' : 'success'
                  }}"
           role="alert">
        {{ session('message') }}
      </div>
      @endif

      {{-- パネル本体 --}}
      <div class="panel panel-default panel-primary">
        <div class="panel-heading">@yield('panel-heading')</div>
        <div class="panel-body">
          @yield('panel-body')
        </div>
        <div class="panel-footer">
          {!!
          config('app.debug')
              ? '開発'
              : 'バグ報告・要望等は <a href="https://twitter.com/wand_ta">wand_ta</a> へどうぞ'
          !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
