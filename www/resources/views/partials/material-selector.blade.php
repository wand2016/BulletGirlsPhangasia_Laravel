<div class="form-group form-inline">
  <label>マテリアル</label>
  @include('partials.category-selector')
  @include('partials.subcategory-selector')
  
  <select id="material-selector"
          name="material_id"
          size="1"
          class="form-control"
          required>
    @foreach($material_list as $material_itr)
    <option value="{{ $material_itr->id }}"
            data-subcategory-id="{{ $material_itr->subcategory_id }}"
            @php
            if (old('material_id') != null && old('material_id') == $material_itr->id) {
      echo('selected');
      }
      else if(isset($material_id) && $material_id == $material_itr->id) {
      echo('selected');
      }
      @endphp
      >
      {{$material_itr->name}}
    </option>
    @endforeach
  </select>

  <select id="material-lv-selector"
          name="material_lv"
          size="1"
          class="form-control"
          required>
    @foreach ($material_lv_list as $material_lv_itr)
    <option value="{{ $material_lv_itr }}"
            @php
            if (old('material_lv') != null && old('material_lv') == $material_lv_itr) {
            echo('selected');
            }
            else if (isset($material_lv) && $material_lv == $material_lv_itr) {
            echo('selected');
            }
            @endphp
            >
      Lv{{ $material_lv_itr }}
    </option>                          
    @endforeach
  </select>
</div>
