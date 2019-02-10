<select id="subcategory-selector"
        name="subcategory_id"
        size="1"
        class="form-control"
        required>
  @foreach($subcategory_list as $subcategory_itr)
  <option value="{{ $subcategory_itr->id }}"
          data-category-id="{{ $subcategory_itr->category_id }}"
          @php
          if (old('subcategory_id') != null && old('subcategory_id') == $subcategory_itr->id) {
    echo('selected');
    }
    
    else if (isset($subcategory_id) && $subcategory_id == $subcategory_itr->id) {
    echo('selected');
    }
    @endphp
    >
    {{ $subcategory_itr->name }}
  </option>
  @endforeach
</select>
