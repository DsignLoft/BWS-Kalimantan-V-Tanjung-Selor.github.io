@props(['banners'])

@foreach ($banners as $banner)
    <a href="{{ $banner->link ?? 'javascript:void(0);' }}">
        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ adminUrl('images/banner/' . $banner->img) }})">
            <div class="slider-content">
                <h1 class="display-2 mb-40">
                    &nbsp;<br />&nbsp;
                </h1>
                {{--                        <p class="mb-65">&nbsp;</p>--}}
                {{--                        <form class="form-subcriber d-flex" action="{{ route('pencarian.tema') }}" method="get">--}}
                {{--                            <input type="text" name="keyword" value="{{ $keyword ?? null }}" placeholder="Cari tema template.." />--}}
                {{--                            <button class="btn" type="submit">Cari</button>--}}
                {{--                        </form>--}}
            </div>
        </div>
    </a>
@endforeach

