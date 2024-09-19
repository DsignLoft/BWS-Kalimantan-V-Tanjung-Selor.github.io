<select {!! $attributes !!} class="form-control select2 @error($attributes['name']) is-invalid @enderror">
    {{ $slot }}
</select>

<script>
    $(document).ready(function(){
        $(".select2").select2({
            theme: "bootstrap4",
        });
    })
</script>