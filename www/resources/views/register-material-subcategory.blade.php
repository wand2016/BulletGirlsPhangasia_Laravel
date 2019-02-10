@extends('layouts.panel')

@section('panel-heading')
サブカテゴリ登録
@endsection

@section('panel-body')
<form method="POST" action="register-material-subcategory/post">
  {{ csrf_field() }}

  <div class="form-group">
    <label>カテゴリ</label>
    @include('partials.category-selector')
  </div>
  
  <div class="form-group">
    <label>サブカテゴリ名</label>
    <input type="text"
           name="name"
           class="form-control"
           value=""
           required />
  </div>
  
  <button type="submit" class="btn btn-primary">登録</button>
</form>

@endsection
