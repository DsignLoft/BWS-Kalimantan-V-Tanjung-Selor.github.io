@extends('layouts.main')
@section('main')
    @php
        $url= $_SERVER['REQUEST_URI'];
        $aPath = explode('/', $url);
    @endphp
    @if (isset($aPath[2]))
        @php
            $databaseHost = 'localhost';
            $databaseName = 'idp_w2p';
            $databaseUsername = 'idp_w2p';
            $databasePassword = 'Dur14n100$';
            $w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

            $id_product = $aPath[2];
            $get_views = mysqli_query($w2p, "SELECT * FROM idp_products WHERE id_product ='$id_product'");
            foreach ($get_views as $total) {
                $total_views = $total['views'];
            }
            $total_update = $total_views + 1;
            if (!mysqli_query($w2p, "UPDATE `idp_products` SET `views`='$total_update' WHERE `id_product`='$id_product'")) {
                echo mysqli_error($w2p);
            }
        @endphp
    @endif
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > <a href="{{ route('products') }}">Produk</a> > {!! $product->name !!}
                </div>
            </div>
        </div>
        <x-alert />
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                @include('product._detail_images')
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <h2 class="title-detail">{!! $product->name !!}</h2>
                                    <p class="title-detail">{!! substr($product->desc_id, 0, 220) !!}..<a href="#description">klik untuk selengkapnya</a></p>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <span class="font-small text-muted"> ({{ $product->review_avg_rating ?? 0 }}<i class="fi fi-sr-star text-warning"></i>) ({{ $product->review_count }} Ulasan)</span>
                                        </div>
                                    </div>
                                    @include('product._detail_form')
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info" id="description">
                            @include('product._detail_description')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{--    @if($product->active == 1)--}}
{{--        <main class="main">--}}
{{--            <div class="page-header breadcrumb-wrap">--}}
{{--                <div class="container">--}}
{{--                    <div class="breadcrumb">--}}
{{--                        <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>--}}
{{--                        > <a href="{{ route('products') }}">Produk</a> > {!! $product->name !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <x-alert />--}}
{{--            <div class="container mb-30">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-10 col-lg-12 m-auto">--}}
{{--                        <div class="product-detail accordion-detail">--}}
{{--                            <div class="row mb-50 mt-30">--}}
{{--                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">--}}
{{--                                    @include('product._detail_images')--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 col-sm-12 col-xs-12">--}}
{{--                                    <div class="detail-info pr-30 pl-30">--}}
{{--                                        <h2 class="title-detail">{!! $product->name !!}</h2>--}}
{{--                                        <p class="title-detail">{!! substr($product->desc_id, 0, 220) !!}..<a href="#description">klik untuk selengkapnya</a></p>--}}
{{--                                        <div class="product-detail-rating">--}}
{{--                                            <div class="product-rate-cover text-end">--}}
{{--                                                <span class="font-small text-muted"> ({{ $product->review_avg_rating ?? 0 }}<i class="fi fi-sr-star text-warning"></i>) ({{ $product->review_count }} Ulasan)</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        @include('product._detail_form')--}}
{{--                                    </div>--}}
{{--                                    <!-- Detail Info -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-info" id="description">--}}
{{--                                @include('product._detail_description')--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </main>--}}
{{--    @else--}}
{{--        <div class="row" style="text-align: center; margin-top: 70px; margin-bottom: 170px;">--}}
{{--            <center>--}}
{{--                <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/banner/Cart Empty.jpg" style="width: 17%;" />--}}
{{--            </center>--}}
{{--            <h3>Mohon Maaf</h3>--}}
{{--            <p>Produk sudah tidak tersedia, silahkan memilih prouduk yang lain</p>--}}
{{--            <div style="text-align: center;">--}}
{{--                <a class="btn btn-success btn-sm" href="/">Belanja Lagi</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    <script>
        let kategori_produk = "<?= $product->category ?>";
    </script>
    <script type="text/javascript">
        document.getElementById('wishlist').onclick = function() {
            document.cookie = "wishlist={!! $product->id_product !!}";
            Swal.fire(
                'Berhasil!',
                'Produk berhasil ditambah ke daftar keinginan!',
                'success'
            )
        };
    </script>
    <script src="{{ asset('assets/js/myJs.js') }}"></script>
    <script src="{{ asset('assets/js/product_detail.js') }}"></script>
@endsection
