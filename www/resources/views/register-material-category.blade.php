@extends('layouts.panel')

@section('panel-heading')
マテリアルカテゴリ登録
@endsection

@section('panel-body')
<form method="POST" action="register-material-category/post">
  {{ csrf_field() }}
  <div class="form-group">
    <label>カテゴリ名</label>
    <input type="text"
           name="name"
           class="form-control"
           value=""
           required />
  </div>
  <button type="submit" class="btn btn-primary">登録</button>
</form>

@endsection
