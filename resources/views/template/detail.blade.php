@extends('layouts.main')
@section('main')
    @foreach($data as $template)
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container-fluid">
            <ol>
                <li><a href="/">Beranda</a></li>
                <li><a href="{{ route('design.online') }}">Template</a></li>
                <li>{!! $template->template_name !!}</li>
            </ol>
        </div>
    </section>
    <section id="product-detail">
        <div class="container-fluid">
            <x-alert />
            <x-auth.validate-error :errors="$errors" />
            <div class="product">
                <div class="row">
                    <div class="col-lg-6">
                        @include('template._detail_images')
                    </div>
                    <div class="col-lg-6">
                        <h4 class="font-weight-bold mb-3">{{ $template->template_name }}</h4>
                        <div class="rating-share">
                            <div class="bagikan">Bagikan : </div>
                            <div style="font-size: 35px;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                                    <i class="fab fa-facebook-square" style="color: blue;"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank"><i class="fab fa-twitter-square" style="color:cornflowerblue;"></i></a>
                                <a href="https://plus.google.com/share?url={{ url()->current() }}" target="_blank"><i class="fab fa-google-plus-square" style="color: orangered;"></i></a>
                                <a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp-square" style="color: greenyellow;"></i></a>
                            </div>
                        </div>
                        @include('template._detail_form')
                    </div>
                </div>

            </div>
        </div>
    </section>
    @endforeach
    <script src="{{ asset('assets/js/product_detail.js') }}"></script>
@endsection
