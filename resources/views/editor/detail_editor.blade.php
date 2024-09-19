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

            $id_template = $aPath[2];
            $get_views = mysqli_query($w2p, "SELECT * FROM nsm_products WHERE id='$id_template'");
            foreach ($get_views as $total) {
                $total_views = $total['views'];
            }
            $total_update = $total_views + 1;
            if (!mysqli_query($w2p, "UPDATE `nsm_products` SET `views`='$total_update' WHERE `id`='$id_template'")) {
                echo mysqli_error($w2p);
            }
        @endphp
    @endif
    @foreach($data as $value)
        <main class="main">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                        > <a href="{{ route('design.online') }}">Template</a> > {!! $value->name !!}
                    </div>
                </div>
            </div>
            <div class="container mb-30">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    @include('editor._detail_images')
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h2 class="title-detail">{!! $value->name !!}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                <span class="font-small text-muted">
{{--                                                    ({{ $value->review_avg_rating ?? 0 }}⭐) ({{ $value->review_count }} Ulasan)--}}
                                                </span>
                                            </div>
                                        </div>
                                        @include('editor._detail_form')
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                @include('editor._detail_description')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
{{--        <script>--}}
{{--            let kategori_produk = "<?= $value->category ?>";--}}
{{--        </script>--}}
    @endforeach
@endsection
