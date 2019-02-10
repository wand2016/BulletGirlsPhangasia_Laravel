@extends('layouts.panel')

@section('panel-heading')
マテリアル一覧
@endsection

@section('panel-body')

<div class="form-group">
  <label>カテゴリ</label>
  <select id="category-selector"
          size="1"
          class="form-control">
    @foreach($category_list as $category)
    <option value="{{ $category->id }}">
      {{$category->name}}
    </option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>サブカテゴリ</label>
  <select id="subcategory-selector"
          name="subcategory_id"
          size="1"
          class="form-control">
    @foreach($subcategory_list as $subcategory)
    <option value="{{ $subcategory->id }}"
      data-category-id="{{ $subcategory->category_id }}">
      {{$subcategory->name}}
    </option>
    @endforeach
  </select>
</div>

<table class="table table-bordered"
       id="material-list">
  <tr><th>マテリアル名</th></tr>
  @foreach($material_list as $material)
  <tr data-subcategory-id="{{ $material->subcategory_id }}">
    <td>
      {{ $material->name }}
    </td>
  </tr>
  @endforeach
</table>


@endsection

@section('scripts-tail')
<script src="{{ asset('js/material-selector.js') }}"></script>
@endsection
