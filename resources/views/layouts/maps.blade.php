<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title -->
  <title><?= $title . ' ' . $setting['website_sparator'] . ' ' . $setting['website_title'] ?></title>
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
    
    .rectangle {
      margin-top: 10px;
      height: 40px;
      width: 220px;
      color: white;
      background-color: #50c878;
      border-radius:7px;
      display: flex;
      justify-content:center;
      align-items: center;
    }
    
    .nsm-ct {
        margin-top: 10px;
        display: flex;
    }
 
    .nsm-box {
        height: 2px;
        width: 62px;
        flex: 1;
        padding: 12px;
    }
    div.scrollmenu {
      background-color: #333;
      overflow: auto;
      white-space: nowrap;
    }

    div.scrollmenu a {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px;
      text-decoration: none;
    }

    div.scrollmenu a:hover {
      background-color: #777;
    }
    .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0; /* remove the gap so it doesn't close */
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
                    </nav>
                </div>
            </div>
        </div>
        
        <nav class="container-fluid navbar navbar-expand-md navbar-dark" style="background-color: rgb(10, 71, 147);">
            <div class="container-fluid" bis_skin_checked="1">
                <button aria-label="Toggle navigation" type="button" class="mr-2 navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" bis_skin_checked="1">
                    <ul class="me-auto navbar-nav">
                        <a href="/" class="nav-link text-white">Beranda</a>
                        <div class="dropdown">
                          <a class="nav-link text-white" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hidrologi
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('layanan.hidrologi.sih3.berau.kelai') }}">Berau Kelai</a>
                            <a class="dropdown-item" href="{{ route('layanan.hidrologi.sih3.sesayap') }}">Sesayap</a>
                          </div>
                        </div>
                        <li class="nav-item">
                            <a href="" class="nav-link text-white">Hidroklimatologi</a>
                        </li>
                        @php $slugs = explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)); @endphp
                        @if($slugs[1] == 'layanan-hidrologi-sih3-ws-berau-kelai')
                        <div class="dropdown">
                          <a class="nav-link text-white" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hidrogeologi
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Akuifer</a>
                            <a class="dropdown-item" href="#">Cekungan Air Tanah</a>
                          </div>
                        </div>
                        @elseif($slugs[1] == 'layanan-hidrologi-sih3-ws-sesayap')
                        <div class="dropdown">
                          <a class="nav-link text-white" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hidrogeologi
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Akuifer</a>
                            <a class="dropdown-item" href="#">Hidrogeologi</a>
                          </div>
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('main')
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
