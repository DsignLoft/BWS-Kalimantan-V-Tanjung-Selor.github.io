@extends('layouts.main')
@section('main')
    <div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md-10">
                    <div class="breadcumb-text">
                        <!--<h5>Beranda -> Berita SDA</h5>-->
                        <h2>{{ $detail->news_title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="get-it">
        <div class="row">

            <div class="container">
                <div class="col-12 col-lg-2 float-left">
                    <h5>Kilas Pengumuman :</h5>
                </div> 
                <div class="col-12 col-lg-10 float-right">
                        
                    <div id="pengumuman" class="carousel carousel-pe slide " data-ride="carousel" >
                        <div class="carousel-inner carousel-inner-pe" >
                                                            @foreach($informations as $info)
                                 <div class="carousel-item active">
                                    <div class="carousel-caption carousel-caption-pe" >
                                        <a href="#">{{ $info->info_title }}</a>
                                      </div>
                                </div>
                                
                            @endforeach
                            </div>       
                        <a class="carousel-control-prev" href="#pengumuman" role="button" data-slide="prev"  >
                            <span class="fa fa-chevron-left" aria-hidden="true" style="padding-top: 15px;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#pengumuman" role="button" data-slide="next" >
                            <span class="fa fa-chevron-right" aria-hidden="true" style="padding-top: 15px;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

<div class="blog-area section-padding-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Title -->
                <h1> {{ $detail->news_title }}</h1>

                <hr>

                <!-- Date/Time -->
                <span class="float-left"> <a href="/">Beranda</a> >> <a href="#">Berita Terkini & Pengumuman</a></span> <span class="date"></span>
                <p class="float-right"><i class="fa fa-clock-o"></i>&nbsp; {{ date('d F Y H:i:s', strtotime($detail->news_date)) }}</p><br>
                <!-- <hr> -->


                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ $detail->news_image }}" alt="{{ $detail->news_title }}">
                <p>Foto :  {{ $detail->news_title }}</p>
                <hr>

                <!-- Post Content -->
                <p style="clear:both">
                    <?= $detail->news_description ?>
                </p>

                <hr>
<p>Bagikan :</p>
<div class="social-media clearfix  float-left">
    <!-- AddToAny BEGIN -->
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_google_gmail"></a>
    </div>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <!-- AddToAny END -->
</div>

<div>
    <span class=" float-right" style="padding-left:20px;">
        <script>
            var pfHeaderImgUrl = '';
            var pfHeaderTagline = '';
            var pfdisableClickToDel = 0;
            var pfHideImages = 0;
            var pfImageDisplayStyle = 'right';
            var pfDisablePDF = 0;
            var pfDisableEmail = 0;
            var pfDisablePrint = 0;
            var pfCustomCSS = '';
            var pfBtVersion = '1';
            (function() {
                var js, pf;
                pf = document.createElement('script');
                pf.type = 'text/javascript';
                pf.src = '//cdn.printfriendly.com/printfriendly.js';
                document.getElementsByTagName('head')[0].appendChild(pf)
            })();
        </script>
        <a href="https://www.printfriendly.com" style="text-decoration:none;" class="printfriendly btn btn-success btn-sm" onclick="window.print();return false;">
            <i class="fa fa-print"></i> Cetak
        </a>
</div>
<br>
            </div>

                            <div class="col-12 col-lg-4">
                    <div class="theme-blog-sidebar-area">
                        
                        <!-- Widget -->
                        <div class="blog-widget-area">
    <a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/agenda_index"><h5>Agenda & Informasi Terkait</h5></a>
    <ul>
            </ul>
</div>

                        <!-- Widget -->
                            <div class="blog-widget-area" style="padding-bottom: 0;" >
        <h5>Berita Terkini</h5>                                
           @foreach($news as $n)
            <div class="single-latest-blog-post d-flex " style="padding-left: 10px; padding-top: 10px;">
                <div class="latest-blog-post-thumb" >
                    <center><img src="{{ $n->news_image }}" alt="{{ $n->news_title }}" style="height:60px;"></center>
                </div>
                <div class="latest-blog-post-content"  >
                    <a class="post_title" href="{{ route('detail.berita', $n->news_slug) }}">{{ $n->news_title }}</a>
                    <a class="post_title" href="{{ route('detail.berita', $n->news_slug) }}"><i>{{ date('d F Y H:i:s', strtotime($n->news_date)) }}</i></a>
                </div>
            </div>
            @endforeach
            </div>
                            <div class="blog-widget-area" style="padding-bottom: 0;">
        <h5>Twitter Widget</h5>
                        <!-- Single Latest Blog Post -->
                <div class="single-latest-blog-post d-flex ">
                    <a class="twitter-timeline" data-chrome="scrollbar" href="" data-widget-id="12"></a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End #####<!-- ##### Footer Area Start ##### -->
@endsection