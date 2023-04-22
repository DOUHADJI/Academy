<div class="form-group">
    <label for="customFile">{{ $label }}</label>

    <div class="custom-file">
        <input type="file" class="custom-file-input @error($name) is-invalid @enderror" name="{{ $name }}">
        <label class="custom-file-label" for="customFile">importer un fichier</label>
    </div>
    @error($name)
        <p class="error text-red-400">
            {{ $message }}
        </p>
    @enderror
</div>
