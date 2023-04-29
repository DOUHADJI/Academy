
<div class="input-group  mb-3 {{  $attributes }}">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="{{ $icon }}"></i></span>
    </div>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ @old($name) }}"
        class='form-control @error($name) is-invalid @enderror' />
       
  </div>
  @error($name)
  <p class="-mt-6 text-sm text-red-400 ">
      {{ $message }}
  </p>
@enderror