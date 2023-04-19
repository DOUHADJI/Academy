@aware(['object', 'disabled'])

@php
    $object = $object();
@endphp

<div class="form-group">



    <label for="'{{ $name }}" class=" text-lg">
        <p class="font-bold mb-2 @error($name) text-red-400 @else text-gray-500 @enderror">
            {{ $label }} @if ($required) * @endif
        </p>
    </label>


    <select name="{{ $name }}"
        placeholder=" @error($name)  {{ $message }}  @else {{ $placeholder }}  @enderror"
        @if ($disabled === 'true') disabled @endif
        class="form-control @error($name) is-invalid @enderror">
        <option value="" class="text-gray-400">Choisir</option>
        @foreach ($options as $option)
            <option key="{{ $option }}" value="{{ $option }}" class="text-gray-400"
                @if ($object !== null && $object->$name == $option) selected @else @selected(old($name) == $option) @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="mb-2 text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>
