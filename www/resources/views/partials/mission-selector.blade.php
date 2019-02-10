<div class="form-group form-inline">  
  <label>ミッション</label>
  <select name="mission_number"
          size="1"
          class="form-control"
          required>
    @foreach ($mission_list as $mission_number_itr)
    <option value="{{ $mission_number_itr }}"
            @php
            if (old('mission_number') != null && old('mission_number') == $mission_number_itr) {
            echo('selected');
            }
            else if(isset($mission_number) && $mission_number == $mission_number_itr) {
            echo('selected');
            }
            @endphp
            >
      M{{ $mission_number_itr }}
    </option>                          
    @endforeach
  </select>

  <select name="mission_difficulty"
          size="1"
          class="form-control"
          required>
    @foreach ($difficulty_list as $index => $difficulty_itr)
    <option value="{{ $index }}"
            @php
            if (old('mission_difficulty') != null && old('mission_difficulty') == $index) {
            echo('selected');
            }
            else if(isset($mission_difficulty) && $mission_difficulty == $index) {
            echo('selected');
            }
            @endphp
            >
      {{ $difficulty_itr }}
    </option>
    @endforeach
  </select>
</div>
