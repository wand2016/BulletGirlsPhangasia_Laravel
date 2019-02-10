@extends('graph-base')

@section('scripts')
@parent
<script src="{{ asset('js/graph_material_vs_mission.js') }}"></script>
@endsection

@section('panel-heading')
グラフ/ミッションからマテリアル
@endsection

@section('graph-update-form')
<form method="GET" action="">
  @include('partials.mission-selector')
  <button type="submit" class="btn btn-primary">更新</button>    
</form>
@endsection

@section('scripts-tail')

<script>

google.charts.load('current', {packages: ['corechart']});

google.charts.setOnLoadCallback(function () {
var mission_number = {!! json_encode($mission_number) !!};
var difficulty_list = {!! json_encode($difficulty_list) !!};
var mission_difficulty = {!! json_encode($mission_difficulty) !!};
var material_list_raw = {!! json_encode($material_list) !!};
var material_lv_list = {!! json_encode($material_lv_list) !!};
var graph_series_raw = {!! json_encode($graph_series) !!};

var graph = new GraphMaterialVsMission(document.getElementById('chart_div'),
                                       mission_number,
                                       difficulty_list[mission_difficulty],
                                       material_list_raw,
                                       material_lv_list,
                                       graph_series_raw);
    graph.initialize();
});

</script>
@endsection
