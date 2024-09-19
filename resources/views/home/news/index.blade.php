@extends('layouts.main')
@section('main')
<div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner2.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <div class="breadcumb-text">
                    <!--<h5>Beranda -> Berita SDA</h5>-->
                    <h2>{{ $title }}</h2>
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

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="theme-blog-posts">
                    <div class="row">
                        @foreach($news as $nw)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="berita-area mb-50">
                                        <div class="blog-thumbnail">
                                            <div class="nama-balai text-center">
                                                <span style="color: #fff">{{ $nw->news_title }}</span>
                                            </div>

                                            <a href="{{ $nw->news_image }}" rel="prettyPhoto">
                                                <img class="center" src="{{ $nw->news_image }}" alt="{{ $nw->news_title }}"></a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="post-container">
                                                {{ substr(strip_tags($nw->news_description), 0, 100) }}..
                                            </div>
                                            <p class="tanggal"><i>{{ date('d F Y', strtotime($nw->news_date)) }}</i>
                                                <a href="{{ route('detail.berita', $nw->news_slug) }}" class="readmore-btn float-right">Selengkapnya</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination Area -->
                <div class="pagination-area">
                    <!--<nav aria-label="Page navigation">-->
                    <!--    <ul class="pagination">-->
                    <!--        <ul class="pagination justify-content-center"><li class="page-item active"><span class="page-link">1<span class="sr-only">(current)</span></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/12" data-ci-pagination-page="2">2</a></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/24" data-ci-pagination-page="3">3</a></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/36" data-ci-pagination-page="4">4</a></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/48" data-ci-pagination-page="5">5</a></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/60" data-ci-pagination-page="6">6</a></span></li><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/12" data-ci-pagination-page="2" rel="next">></a><li class="page-item"><span class="page-link"><a href="https://sda.pu.go.id/balai/bbwspemalijuana/pages/category/1/1068" data-ci-pagination-page="90">>></a></ul>                        </ul>-->
                    <!--</nav>-->
                </div>
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
                </div>        </div>
    </div>
</div>
@endsection