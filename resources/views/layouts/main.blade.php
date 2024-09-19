<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title -->
  <title><?= $setting['website_title'] . ' ' . $setting['website_sparator'] . ' ' . $setting['website_tagline'] ?></title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="icon" href="https://sda.pu.go.id/balai/bbwspemalijuana/assets/logo_pu_visual.png">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="{{ asset('nsm/buya/css/style.css?v=4') }}">
  <script src="https://kit.fontawesome.com/78770da437.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/eleganticons@0.0.1/lte-ie7.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/eleganticons@0.0.1/css/style.min.css">
  <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

  <meta name="Description" content="">
  <meta name="Keywords" content="">

  <style>
    #map { min-height: 500px; }
    
    .ig_feed_container {
      width: 100%;
      margin: 0 auto;
      font-family: Arial, Helvetica, sans-serif;
    }

    .ig_post_container {
      border: 2px solid #f1f1f1;
      margin-bottom: 25px;
      margin-left: 3%;
      width: 100%;
      height: 100%;
      float: left;
    }

    .ig_post_container img {
      width: 100%;
    }

    .ig_post_container .ig_post_details {
      padding: 15px;
    }

    .ig_post_container .ig_view_link {
      margin-top: 10px;
    }
  </style>

  <!-- akesibilitas -->

  <script src="https://code.responsivevoice.org/responsivevoice.js?key=3FZ9sFT9"></script>

</head>

<body>    <!-- ##### Search Wrapper Start ##### -->
    <div class="search-wrapper d-flex align-items-center justify-content-center bg-img foo-bg-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="close--icon">
            <i class="fa fa-times"></i>
        </div>
        <!-- Logo -->
        <a href="https://sda.pu.go.id/balai/bbwspemalijuana/" class="search-logo"><img src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/logo_pu_visual.png" style="width:40%" alt="Logo bbwspj"></a>
        <!-- Search Form -->
        <div class="search-form">
            <form action="/" method="get">
                <input name="keywords" type="text" data-value="search" placeholder="Pencarian">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <!-- Copwrite Text -->
        <div class="copywrite-text">
            <p>
                © 2024 <a href="/"><?= $setting['website_title'] ?></a>.
            </p>
        </div>
    </div>
    <!-- ##### Search Wrapper End ##### -->


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100-0">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <a href="#" class="float-left" target="_blank" style="padding-top: 5px;color:#fff;font-size:14px;"><img src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/home-pu.png" style="width:25px;height:25px;">
                            <span>BWS-net</span></a>
                        <div class="top-header-content h-75 d-flex align-items-center justify-content-end">

                            <!-- Next Events Countdown -->
                            <div class=" d-none d-sm-block">
                                <div class="next-events-countdown d-flex align-items-center">
                                    <a style="font-size:12px;padding-top:5px;color:#fff;" href="#"><i class="fa fa-calendar"></i>
                                        <script type="text/javascript" src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/front/tanggal.js"></script>
                                    </a>&nbsp;&nbsp;

                                    <a href="{!! $setting['instagram'] !!}" style="color:#fff;padding-left: 10px; padding-top:5px;" target="_blank"><i class="fa fa-2x fa-instagram"></i>&nbsp;</a>
                                    <a href="{!! $setting['youtube'] !!}" style="color:#fff;padding-left: 10px; padding-top:5px;" target="_blank"><i class="fa fa-2x fa-youtube-square"></i>&nbsp;</a>
                                    <a href="{!! $setting['x'] !!}" style="color:#fff;padding-left: 10px; padding-top:5px;" target="_blank"><i class="fa fa-2x fa-twitter-square"></i>&nbsp;</a>

                                    <!-- <a href="https://www.youtube.com/channel/UCmpCok-hin9JW152Yd9lIDw" target="_blank" style="color:#fff;padding-left: 10px;padding-top:5px;">
                                        <img src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/img/penaTV.png" style="height:40px;">&nbsp;</a>&nbsp;&nbsp;
                                    </a> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="theme-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container" style="max-width:1600px;">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="themeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/"><img src="{{ asset('nsm/buya/images/Kop BWS-1.png') }}" alt="Logo BWS" width="400px;"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Profil</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ route('home.history') }}">Sejarah</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home.visimisi') }}">Visi dan Misi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home.structurorganisasi') }}">Struktur Organisasi</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Berita</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{route('berita') }}">Berita Balai</a>
                                            </li>
                                            <li>
                                                <a href="{{route('pengumuman') }}">Pengumuman</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Info Publik</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="#">Perencanaan</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="{{ route('planning.renstra') }}">Renstra</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('planning.rpsda') }}">Pola dan RPSDA</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Kinerja</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="{{ route('planning.lakip') }}">LAKIP</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Infrastruktur</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="{{ route('infrastruktur.bendung') }}">Bendung</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('infrastruktur.bendungan') }}">Bendungan</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('infrastruktur.embung') }}">Embung</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('infrastruktur.irigrasi') }}">Daerah Irigasi</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('infrastruktur.pantai') }}">Pantai</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Layanan</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ route('layanan.rekomtek') }}">Layanan Rekomtek</a>
                                            </li>
                                            <li>
                                                <a href="#">Layanan Hidrologi</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="{{ route('layanan.hidrologi.sih3.berau.kelai') }}">SIH3 WS Berau Kelai</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('layanan.hidrologi.sih3.sesayap') }}">SIH3 WS Sesayap</a>
                                                    </li>
                                                    <li>
                                                        <!--<a href="https://update.xprint.id/builder/form/index.php?r=app%2Fform&id=733DRw" target="_blank">Isi Formulir</a>-->
                                                        <a href="{{ route('permohonan.informasi') }}">Isi Formulir</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Layanan Posko Bencana</a>
                                                <ul class="dropdown">
                                                    <li>
                                                        <a href="https://wa.me/62882002841290" target='_blank'>Hubungi Petugas</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('laporan.bencana.banjir') }}">Isi Formulir</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('pengaduan.aspirasi') }}">Layanan Pengaduan</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('layanan.survei') }}">Layanan Survei</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Standar</a>
                                        <ul class="dropdown">
                                            <li>
                                                <a href="{{ route('maklumat.pelayanan') }}">Maklumat Pelayanan</a>
                                                <a href="{{ route('layanan.sidterap') }}">Layanan SID-TERAP</a>
                                                <a href="{{ route('layanan.pengaduan') }}">Layanan Permohonan Pengaduan</a>
                                                <a href="#">Layanan Hidrologi Kualitas Air</a>
                                                <a href="{{ route('layanan.rekomtek') }}">Layanan Rekomtek</a>
                                            </li>
                                        </ul>
                                    </li>
                                <li>
                                    <a href="{{ route('home.tracking') }}">Tracking</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.contact') }}">Kontak</a>
                                </li>
                                </ul>
                                <div class="search-btn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @yield('main')
    <footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="container">

        <div class="main-footer-area section-padding-30-0">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-5">
                    <div class="footer-widget" style="padding-left: 15px;text-align: left">
                        <div class="widget-title">
                            <h6>{{ $titles->title_footer1 }}</h6>
                        </div>
                        <!-- Single Contact Area -->
                        <div class="single-contact-area mb-15" style="margin-top: -10px;">
                            <p style="color: #fff">{{ $titles->title_footer2 }}</p>
                            <span style="color: #fff">
                                {{ $titles->title_footer3 }}
                            </span>
                        </div>
                        <!-- Single Contact Area -->
                        <div class="single-contact-area mb-15" style="margin-top: -10px;">
                            <p style="color: #fff">{{ $titles->title_footer4 }}</p>
                            <a href="#"> <span style="color: #fff">
                                    {{ $titles->title_footer5 }} </span></a>
                        </div>

                        <!-- Single Contact Area -->
                        <div class="single-contact-area mb-15">
                            <p style="color: #fff">{{ $titles->title_footer6 }}</p>

                            <span style="color: #fff">{{ $titles->title_footer7 }}</span>
                        </div>

                        <!-- Single Contact Area -->
                        <div class="single-contact-area mb-15">
                            <p style="color: #fff">{{ $titles->title_footer8 }}</p>
                            <a href="mailto:{{ $titles->title_footer9 }}"><span style="color: #fff">{{ $titles->title_footer9 }}</span></a>
                        </div>

                        <br>
                        <br>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="footer-widget">
                        <div class="widget-title" style="text-align: left;">
                            <h6>{{ $titles->title_footer11 }}</h6>
                        </div>
                        <div style="text-align: left;">
                        
                            <a href="{!! $setting['youtube'] !!}" style="color:#fff;padding-right: 10px;" target="_blank">
                                <i class="fa fa-2x fa-youtube-square"></i>&nbsp;</a>

                            <a href="{!! $setting['x'] !!}" style="color:#fff;padding-right: 10px;" target="_blank">
                                <i class="fa fa-brands fa-x-twitter"></i>&nbsp;</a>
                            <a href="{!! $setting['instagram'] !!}" style="color:#fff;" target="_blank">
                                <i class="fa fa-2x fa-instagram"></i>&nbsp;</a>
                            <a href="{!! $setting['instagram'] !!}" style="color:#fff;width:20px" target="_blank">
                                <i class="fa fa-brands fa-blogger"></i>&nbsp;</a><br>
                            <hr>
                            <p>
                            <div class="widget-title" style="text-align: left;">
                                <h6>{{ $titles->title_footer12 }}</h6>
                            </div>
                            <!--<center>-->
                                <script type="text/javascript" src="//widget.supercounters.com/ssl/flag.js"></script>
                                <script type="text/javascript">
                                    sc_flag(1501646, "11A8F2", "000000", "11A8F2", 2, 10, 0, 0)
                                </script><br /><noscript><a href="http://www.supercounters.com/">Flag Counter</a></noscript><br />
                            <!--</center>-->
                            <!-- BEGIN: Powered by Supercounters.com -->
                            <!--<center>-->
                                <script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script>
                                <script type="text/javascript">
                                    sc_online_i(1620435, "ffffff", "1e49e6");
                                </script><br><noscript><a href="https://www.supercounters.com/">online counter</a></noscript>
                            <!--</center>-->
                            <!-- END: Powered by Supercounters.com -->

                            </p>

                                                    </div>

                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-md-4 col-xl-2">
                    <div class=" d-none d-sm-block">
                        <div class="footer-widget " style="padding-left: 10px;line-height:10px;">
                            <div class="widget-title">
                                <h6 style="color: #fff">{{ $titles->title_footer13 }}</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li style="color:white;"><a style="color:white;" href="#"><strong>Kalima</strong></a></li>
                                    <br>
                                    <li style="color:white;"><a style="color:white;" href="#"><strong>Hubungi Kami</strong></a></li>
                                    <br>
                                    <li style="color:white;"><a style="color:white;" href="#"><strong>FAQ</strong></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-md-12 col-xl-2">
                    <!-- <div class="d-flex flex-wrap"> -->
                    <div class="footer-widget" style="padding-left: 15px; text-align: center;">
                        <div class="widget-title">
                            <h6>{{ $titles->title_footer14 }}</h6>
                        </div>
                          @foreach($footers as $ft)
                            <a title="Direktorat Jendral Sumber Daya Air" href="{{ $ft->link }}" target="_blank">
                                <img style="width:50px;margin: 5px;transition: all 1s;background-color:#fff; padding:3px 0px 3px 0px;" src="https://update.xprint.id/images/banner/{{ $ft->img }}" alt="{{ $ft->text_id }}">
                            </a>
                          @endforeach
                       </div>
                </div>
            </div>
        </div>

        <div id="copyright">
            <div class="row">
                <div class="col-sm-12">
                    <p style="font-size: 10px;">{{ $titles->title_footer10 }} <a href="#">0.00.01</a> All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/active.js"></script>
    <!--  Pretty Photo -->
    <script src="https://sda.pu.go.id/balai/bbwspemalijuana/assets/frontend/js/jquery/jquery.prettyPhoto.js"></script>
    <script>
        $(document).ready(function() {
            $("a[rel^='prettyPhoto']").prettyPhoto();
        });
    </script>

    <script type="text/javascript">
        //return null; // lpse lagi error, box "konten lpse" dimatiin dulu
        $(document).ready(function() {

            var flash = "";
            if (flash) {
                var pesan = "";
                alert(pesan);
            }

            $('.btn-pencarian').click(function(e) {
                e.preventDefault();
                $('#modal-pencarian').modal();
            })

            var url = "https://pu.go.id/lpse";
            // alert(url);
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: url,
                success: function(data) {
                    // console.log(data);
                    $('.tbl-pengadaan').append(data.data);
                },
                erro: function(a, b, c) {
                    alert(c);
                }
            })
        });
    </script>

</body>

</html>
