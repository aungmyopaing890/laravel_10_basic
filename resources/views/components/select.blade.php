@props(['name' => $name, 'options' => $options, 'selected' => 'false', 'all' => false])

<div class="row mb-3">
    <label for="{{$attributes['id']}}" class="col-md-4 col-form-label text-md-end">Select {{$attributes['id']}}</label>
    <div class="col-md-6">
        <select name="{{ $name }}" class="form-control select2-option">
            @foreach($options as $q)
                <option value="{{ $q['id'] }}" {{ $selected== $q['id']  ? "selected":"" }}>{{ $q['name']  }}</option>
            @endforeach
        </select>
    </div>
    @error($name)
        <small class="text-danger font-weight-bold">{{ $message }}</small>
    @enderror
</div>



