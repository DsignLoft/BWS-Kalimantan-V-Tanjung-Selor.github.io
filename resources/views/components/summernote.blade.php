<textarea {!! $attributes !!} class="form-control textarea @error($attributes['name']) is-invalid @enderror">{{ $slot }}</textarea>

<script>
    $(document).ready(function() {
        $('.textarea').summernote({
            lineHeights: []
            , fontNames: []
            , toolbar: []
        });
    });

</script>
