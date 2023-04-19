
@aware(['object','disabled'])
@php
    $object = $object()
@endphp

<div class="form-group">


<label for="{{ $name }}" class=" text-lg @error($name)
    text-red-400 @else text-gray-500
@enderror">
    <p class="font-bold mb-2">
        {{ $label }} @if($required=="true") * @endif 
    </p>
</label>

    <input type="{{ $type }}" name="{{ $name }}" value="@if($object !== null ){{ $object -> $name }}@else{{ @old($name) }}@endif"
        placeholder="{{ $placeholder }}"
        class="form-control @error($name) is-invalid @enderror"
        @if ($disabled === "true") disabled @endif
        @if($type === "file") accept="image/png, image/jpeg" @endif
         />
         @error($name)
         <p class="mb-2 text-red-400">
             {{ $message }}
         </p>
     @enderror
    

</div>