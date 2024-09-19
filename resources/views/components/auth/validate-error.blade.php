@props(['errors'])

@if ($errors->any())
<div {{ $attributes }}>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul style="list-style: disc">
            @foreach ($errors->all() as $error)
            <li class="my-2">{!! $error !!}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
</div>
@endif
