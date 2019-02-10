<select id="category-selector"
        name="category_id"
        size="1"
        class="form-control"
        required>
  @foreach($category_list as $category_itr)
  <option value="{{ $category_itr->id }}"
          @php
          if (old('category_id') != null && old('category_id') == $category_itr->id) {
    echo('selected');
    }
    else if (isset($category_id) && $category_id == $category_itr->id) {
    echo('selected');
    }
    @endphp
    >
    {{$category_itr->name}}
  </option>
  @endforeach
</select>
