<textarea {!! $attributes !!} class="form-control @error($attributes['name']) is-invalid @enderror">{{ $slot }}</textarea>
