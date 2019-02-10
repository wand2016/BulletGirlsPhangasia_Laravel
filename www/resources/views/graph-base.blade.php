@extends('layouts.panel')

@section('scripts')
<script src="https://www.gstatic.com/charts/loader.js"></script>

@endsection

@section('panel-body')
<div id="chart_div"></div>
<hr />

@yield('graph-update-form')

@endsection
