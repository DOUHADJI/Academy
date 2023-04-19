
<div class="input-group  mb-3 {{  $attributes }}">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="{{ $icon }}"></i></span>
    </div>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ @old($name) }}"
        class='form-control ' >
        @error($name)
        <p class=" w-full -mt-8 text-sm pl-32 text-red-400 ">
            {{ $message }}
        </p>
    @enderror
  </div>
