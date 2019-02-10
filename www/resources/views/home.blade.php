@extends('layouts.panel')

@section('panel-heading')
マテリアル調査サイト
@endsection

@section('panel-body')
<p>
    マテリアルに重複があったため修正しました。<br />
    【集弾性能上昇】は【命中率上昇】大カテゴリの中にあります
</p>
<hr />
<p><a href="/graph/material-vs-mission">グラフ/ミッションからマテリアル</a></p>
<p><a href="/graph/mission-vs-material">グラフ/マテリアルからミッション</a></p>    
<hr />
<p><a href="/add-data">データ追加</a></p>
<hr />
<p><a href="/register-material-category">マテリアルカテゴリ登録</a></p>
<p><a href="/register-material-subcategory">マテリアルサブカテゴリ登録</a></p>    
<p><a href="/register-material">マテリアル登録</a></p>
<hr />
<p><a href="/materials">マテリアル一覧</a></p>

@endsection
