@extends('graph-base')

@section('scripts')
@parent
<script src="{{ asset('js/graph_mission_vs_material.js') }}"></script>
@endsection

@section('panel-heading')
グラフ/マテリアルからミッション
@endsection

@section('graph-update-form')
<form method="GET" action="">
  @include('partials.material-selector')
  <button type="submit" class="btn btn-primary">更新</button>    
</form>
@endsection

@section('scripts-tail')

<script>

google.charts.load('current', {packages: ['corechart']});

google.charts.setOnLoadCallback(function () {
    var material_id = {!! json_encode($material_id) !!};
    var fq_material = {!! json_encode($fq_material) !!};
    var material_name = [
        fq_material.category_name,
        fq_material.subcategory_name,
        fq_material.name
    ].join('/');
    var material_lv = {!! json_encode($material_lv) !!};
    var mission_list = {!! json_encode($mission_list) !!};
    var difficulty_list = {!! json_encode($difficulty_list) !!};
    var graph_series_raw = {!! json_encode($graph_series) !!};

    var graph = new GraphMissionVsMaterial(document.getElementById('chart_div'),
                                           material_name,
                                           material_lv,
                                           mission_list,
                                           difficulty_list,
                                           graph_series_raw);
    graph.initialize();
});

</script>
    <script src="{{ asset('js/material-selector.js') }}"></script>
@endsection
