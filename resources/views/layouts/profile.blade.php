@php
    $databaseHost = 'localhost';
    $databaseName = 'idp_w2p';
    $databaseUsername = 'idp_w2p';
    $databasePassword = 'Dur14n100$';
    $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $idp_pay = mysqli_query($connect_w2p, "SELECT * FROM idp_customers WHERE id_customer = ".Auth()->user()->id_customer." LIMIT 1");
    $affiliate = mysqli_query($connect_w2p, "SELECT * FROM nsm_affiliate WHERE customer_id = ".Auth()->user()->id_customer." LIMIT 1");
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>IDP | {{ $title ?? 'Cetak Xpres, Harga Ngepres, Kualitas The Best' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="indoprinting" />
    <meta content="indoprinting" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/gmaps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/input-file.css') }}">
    <link rel="stylesheet" href="{{ asset('nsm/indoprinting-new/frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('nsm/indoprinting-new/frontend/assets/css/main.css?v=6.0') }}" />
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css" />
    <script src="https://indoprinting.co.id/assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://indoprinting.co.id/assets/js/input-file.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/myStyle.css') }}">
</head>

<?php
if (isset($_COOKIE['theme-active'])) {
    echo "<body id='theme-active' style='background: ".$_COOKIE['theme-active']."'>";
} else {
    echo "<body id='theme-active' style='background: #FFFFFF'>";
}
?>

@php
    $databaseHost = 'localhost';
    $databaseName = 'idp_w2p';
    $databaseUsername = 'idp_w2p';
    $databasePassword = 'Dur14n100$';
    $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $design_online_mmt = mysqli_query($connect_w2p, "SELECT * FROM nsm_categories WHERE parent = 2 AND type = 'products' ORDER BY id desc");
    $design_online_calender = mysqli_query($connect_w2p, "SELECT * FROM nsm_categories WHERE parent = 24 AND type = 'products' ORDER BY id desc");
    $design_online_label = mysqli_query($connect_w2p, "SELECT * FROM nsm_categories WHERE parent = 26 AND type = 'products' ORDER BY id desc");
    $product_category_1 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category desc LIMIT 8");
    $product_category_2 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category asc LIMIT 8");
    $product_category_3 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category LIMIT 9");
    $product_category_4 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category desc LIMIT 5");
    $product_category_5 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category asc LIMIT 5");
    $product_category_6 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category desc LIMIT 2");
    $product_category_7 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category asc LIMIT 2");
@endphp
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Tampilan Baru, Harga Baru. Lebih <strong>HEMAT</strong> Tentunya</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li>
                                <?php
                                if (isset($_COOKIE['theme-active'])) {
                                    if ($_COOKIE['theme-active'] == '#FFFFFF') {
                                        echo "<a onclick='darkMode()'><i class='fi fi-sr-moon'></i></a>";
                                    } elseif ($_COOKIE['theme-active'] == '#0C153B') {
                                        echo "<a onclick='lightMode()'><i class='fi fi-sr-sun'></i></a>";
                                    } else {
                                        echo "<a onclick='darkMode()'><i class='fi fi-sr-moon'></i></a>";
                                    }
                                } else {
                                    echo "<a onclick='darkMode()'><i class='fi fi-sr-moon'></i></a>";
                                }
                                ?>
                            </li>
                            <li><a href="{{ route('toko.kami') }}" target="_blank">Toko Kami</a></li>
                            <li><a href="{{ route('track.order.w2p') }}" target="_blank">Lacak Pesanan</a></li>
                            <li><a href="{{ route('price.list') }}" target="_blank">Price List</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            {{--<li>Butuh bantuan? <a href="https://wa.me/6282132003200" target="_blank"><strong class="text-brand"> 0821 3200 3200</strong></a></li>--}}
                            <li><a href="{{ route('term') }}" target="_blank">Syarat & Ketentuan</a></li>
                            <li><a href="{{ route('cara.order') }}" target="_blank">Cara Order</a></li>
                            <li><a href="{{ route('faq') }}" target="_blank">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none sticky-bar d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/">
                        <x-logo />
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ route('pencarian') }}" method="get">
                            <select class="select-active" name="search">
                                <option value="product">Produk / Tema</option>
                            </select>
                            <input type="text" name="keyword" value="{{ $keyword ?? null }}" placeholder="Cari produk / tema template..." />
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">

                            <div class="header-action-icon-2">
                                <a href="{{ route('wishlist') }}">
                                    <img class="svgInject" alt="Infogotalent" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count blue">0</span>
                                </a>
                                <a href="{{ route('wishlist') }}"><span class="lable">Wishlist</span></a>
                            </div>

                            <div class="header-action-icon-2">
                                @guest
                                    <a href="https://studio.indoprinting.co.id/cart">
                                        <img class="svgInject" alt="Infogotalent" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-design.svg') }}" />
                                        <span class="pro-count blue">
                                        <?php if (isset($_COOKIE['design_total'])) {
                                            echo $_COOKIE['design_total'];
                                        } else {
                                            echo "0";
                                        } ?>
                                    </span>
                                    </a>
                                    <a href="https://studio.indoprinting.co.id/cart"><span class="lable ml-0">Design</span></a>
                                @endguest
                                @auth
                                        @if(Auth()->user()->phone == null)
                                            <a href="#" onClick="alert('Mohon Maaf, Silahkan untuk mengisi nomor telepon anda untuk mengakses Design List, Terima Kasih')">
                                        @else
                                            <a href="{!! 'https://studio.indoprinting.co.id/cart?uid=' . Auth()->user()->phone !!}">
                                        @endif
                                        <img class="svgInject" alt="Nest" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-design.svg') }}" />
                                        <span class="pro-count blue">
                                        <?php if (isset($_COOKIE['design_total'])) {
                                            echo $_COOKIE['design_total'];
                                        } else {
                                            echo "0";
                                        } ?>
                                    </span>
                                    </a>
                                        @if(Auth()->user()->phone == null)
                                            <a href="#" onClick="alert('Mohon Maaf, Silahkan untuk mengisi nomor telepon anda untuk mengakses Design List, Terima Kasih')"><span class="lable ml-0">Design</span></a>
                                        @else
                                            <a href="{!! 'https://studio.indoprinting.co.id/cart?uid=' . Auth()->user()->phone !!}"><span class="lable ml-0">Design</span></a>
                                        @endif
                                @endauth
                            </div>

                            <div class="header-action-icon-2">
                                <a href="{{ route('cart') }}">
                                    <img class="svgInject" alt="Infogotalent" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count blue">
                                        <?php if (isset($_COOKIE['cart_total'])) {
                                            echo $_COOKIE['cart_total'];
                                        } else {
                                            echo "0";
                                        } ?>
                                    </span>
                                </a>
                                <a href="{{ route('cart') }}"><span class="lable">Keranjang</span></a>
                            </div>

                            <div class="header-action-icon-2">
                                {{--if not login--}}
                                @guest
                                    <a href="{{ route('login') }}">
                                        <img class="svgInject" alt="Infogotalent" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{ route('login') }}"><span class="lable ml-0">Akun</span></a>
                                @endguest
                                {{--if login--}}
                                @auth
                                    @php
                                        setcookie('nsm_session_idp',Auth()->user()->phone, time()+(3600*24),null,'.studio.indoprinting.co.id');
                                    @endphp
                                    <a href="#">
                                        <img class="svgInject" alt="Infogotalent" src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href='#'><span class='lable ml-0'>{!! Auth()->user()->name ?? Auth()->user()->phone !!}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('profile') }}"><i class="fi fi-sr-user mr-10"></i>Akun Saya</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('track.order.w2p') }}" target="_blank"><i class="fi fi-sr-location-alt mr-10"></i>Lacak Pesanan</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fi fi-sr-label mr-10"></i>Voucher Saya</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('wishlist') }}"><i class="fi fi-sr-heart mr-10"></i>Wishlist Saya</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('edit.profile') }}"><i class="fi fi-sr-settings-sliders mr-10"></i>Pengaturan</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout')  }}"><i class="fi fi-sr-exit mr-10"></i>Keluar</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="javascript:0;">
                                    <img alt="Nest" src="{{ asset('assets/images/icons/bell.svg') }}" />
                                    <span class="pro-count blue">0</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <?php if (isset($_COOKIE['wishlist'])) { ?>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" src="assets/imgs/shop/thumbnail-3.jpg" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                <h4><span>1 × </span>$800.00</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <?php } else {?>
                                        <li>
                                            <p>Mohon maaf, untuk saat ini belum ada notifikasi untukmu</p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/">
                        <x-logo />
                    </a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-sr-apps"></span> <span class="et">Cari</span> Semua Kategori
                            <i class="fi-sr-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach($product_category_4 as $pc4)
                                        <li>
                                            <a href="{{ route('category', $pc4['id_category']) }}">
                                                <img src="{{ asset('assets/images/icons/' . $pc4['image']) }}" alt="" /><?= $pc4['name'] ?>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="end">

                                    @foreach($product_category_5 as $pc5)
                                        <li>
                                            <a href="{{ route('category', $pc5['id_category']) }}">
                                                <img src="{{ asset('assets/images/icons/' . $pc5['image']) }}" alt="" /><?= $pc5['name'] ?>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($product_category_6 as $pc6)
                                            <li>
                                                <a href="{{ route('category', $pc6['id_category']) }}">
                                                    <img src="{{ asset('assets/images/icons/' . $pc6['image']) }}" alt="" /><?= $pc6['name'] ?>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach($product_category_7 as $pc7)
                                            <li>
                                                <a href="{{ route('category', $pc7['id_category']) }}">
                                                    <img src="{{ asset('assets/images/icons/' . $pc7['image']) }}" alt="" /><?= $pc7['name'] ?>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Lihat semua...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-hot.svg') }}" alt="hot deals" /><a href="{{ route('limited.discount') }}">Flash Sale</a></li>
                                <li>
                                    <a href="/">Beranda</a>
                                </li>
                                <li class="position-static">
                                    <a href="#" id="show-products" style="display: block">Produk Kami<i class="fi-sr-angle-down"></i></a>
                                    <a href="#" id="hidden-products" style="display: none">Produk Kami<i class="fi-sr-angle-down"></i></a>
                                    <ul class="mega-menu" style="display: none" id="dropdown-products">
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('products') }}">Produk Terbaru</a>
                                            <ul>
                                                @foreach($product_category_1 as $pc1)
                                                <li>
                                                    <a href="{{ route('category', $pc1['id_category']) }}"><?= $pc1['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('products') }}">Produk Trend</a>
                                            <ul>
                                                @foreach($product_category_2 as $pc2)
                                                <li>
                                                    <a href="{{ route('category', $pc2['id_category']) }}"><?= $pc2['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('products') }}">Produk Terlaris</a>
                                            <ul>
                                                @foreach($product_category_3 as $pc3)
                                                <li>
                                                    <a href="{{ route('category', $pc3['id_category']) }}"><?= $pc3['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="{{ route('products') }}"><img src="{{ asset('assets/images/banner/BANNER PRODUK.png') }}" alt="Indoprinting" /></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="position-static">
                                    <a href="#" id="show-templates" style="display: block">Design Online <i class="fi-sr-angle-down"></i></a>
                                    <a href="#" id="hidden-templates" style="display: none">Design Online <i class="fi-sr-angle-down"></i></a>
                                    <ul class="mega-menu" id="dropdown-templates" style="display: none">
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('design.online')  }}">Design Banner / MMT</a>
                                            <ul>
                                                @foreach($design_online_mmt as $mmt)
                                                <li>
                                                    <a href="{{ route('template.category', $mmt['category_id']) }}"><?= $mmt['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('design.online')  }}">Design Label</a>
                                            <ul>
                                                @foreach($design_online_label as $label)
                                                <li>
                                                    <a href="{{ route('template.category', $label['category_id']) }}"><?= $label['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-22">
                                            <a class="menu-title" href="{{ route('design.online')  }}">Design Kalender</a>
                                            <ul>
                                                @foreach($design_online_calender as $calender)
                                                <li>
                                                    <a href="{{ route('template.category', $calender['category_id']) }}"><?= $calender['name'] ?></a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="sub-mega-menu sub-mega-menu-width-34">
                                            <div class="menu-banner-wrap">
                                                <a href="{{ route('design.online')  }}"><img src="{{ asset('assets/images/banner/BANNER DESIGN.png') }}" alt="Indoprinting Studio" /></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="https://indoprinting.infogotalent.com/" target="_blank">Design Upload</a>
                                </li>
                                <li>
                                    <a href="{{ route('our.work') }}">Galeri</a>
                                </li>
{{--                                <li>--}}
{{--                                    <a href="#" id="show-join" style="display: block">Bergabung <i class="fi-sr-angle-down"></i></a>--}}
{{--                                    <a href="#" id="hidden-join" style="display: none">Bergabung <i class="fi-sr-angle-down"></i></a>--}}
{{--                                    <ul class="sub-menu" id="dropdown-join" style="display: none">--}}
{{--                                        <li><a href="{{ route('register.reseller') }}">Menjadi Reseller</a></li>--}}
{{--                                        <li><a href="{{ route('register.creator') }}">Menjadi Creator</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('nsm/indoprinting-new/frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <a href="https://wa.me/6282132003200" target="_blank"><p>0821 3200 3200<span>24/7 Pusat layanan</span></p></a>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <?php if (!isset($_COOKIE['idp_phone'])) {?>
                            <a href="https://studio.indoprinting.co.id/cart">
                                <img alt="Nest" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-design.svg" />
                                <span class="pro-count white">
                                    <?php if (isset($_COOKIE['design_total'])) {
                                        echo $_COOKIE['design_total'];
                                    } else {
                                        echo "0";
                                    } ?>
                                </span>
                            </a>
                            <?php } else { ?>
                            <a class="mini-cart-icon" href="https://studio.indoprinting.co.id/cart?uid=<?= $_COOKIE['idp_phone'] ?>">
                                <img alt="Nest" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-design.svg" />
                                <span class="pro-count white">
                                    <?php if (isset($_COOKIE['design_total'])) {
                                        echo $_COOKIE['design_total'];
                                    } else {
                                        echo "0";
                                    } ?>
                                </span>
                            </a>
                            <?php } ?>

                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{ route('cart') }}">
                                <img alt="Nest" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-cart.svg" />
                                <span class="pro-count white">
                                    <?php if (isset($_COOKIE['cart_total'])) {
                                        echo $_COOKIE['cart_total'];
                                    } else {
                                        echo "0";
                                    } ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="#">
                    <x-logo />
                </a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Cari Produk…" />
                    <button type="submit"><i class="fi-sr-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="/">Beranda</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Produk Kami</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="{{ route('products') }}">Produk Terbaru</a>
                                    <ul class="dropdown">
                                        <?php foreach ($product_category_1 as $pc1) {?>
                                        <li><a href="{{ route('category', $pc1['id_category']) }}"><?= $pc1['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('products') }}">Produk Trend</a>
                                    <ul class="dropdown">
                                        <?php foreach ($product_category_2 as $pc2) {?>
                                        <li><a href="{{ route('category', $pc2['id_category']) }}"><?= $pc2['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('products') }}">Produk Terlaris</a>
                                    <ul class="dropdown">
                                        <?php foreach ($product_category_3 as $pc3) {?>
                                        <li><a href="{{ route('category', $pc3['id_category']) }}"><?= $pc3['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Design Online</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="{{ route('design.online') }}">Design Banner / MMT</a>
                                    <ul class="dropdown">
                                        <?php foreach ($design_online_mmt as $mmt) {?>
                                        <li><a href="{{ route('template.category', $mmt['category_id']) }}"><?= $mmt['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('design.online') }}">Design Label</a>
                                    <ul class="dropdown">
                                        <?php foreach ($design_online_label as $label) {?>
                                        <li><a href="{{ route('template.category', $label['category_id']) }}"><?= $label['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('design.online') }}">Design Kalender</a>
                                    <ul class="dropdown">
                                        <?php foreach ($design_online_calender as $calender) {?>
                                        <li><a href="{{ route('template.category', $calender['category_id']) }}"><?= $calender['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('ig.cloud') }}">iGCloud</a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Bergabung</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('register.reseller') }}">Menjadi Reseller</a></li>
                                <li><a href="{{ route('register.creator') }}">Menjadi Creator</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="{{ route('toko.kami') }}"><i class="fi-sr-marker"></i> Toko Kami </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="{{ route('login') }}"><i class="fi-sr-user"></i>Masuk / Daftar </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="https://wa.me/6282132003200"><i class="fi-sr-headphones"></i>0821 3200 3200 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Ikuti Kami</h6>
                <a href="#"><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
            <div class="site-copyright">Copyright 2023 © Indoprinting. All rights reserved</div>
        </div>
    </div>
</div>
<!--End header-->

<script type="text/javascript">
    document.getElementById('input-number').onclick = function() {
        Swal.fire(
            'Mohon Maaf!',
            'Silahkan untuk mengisi nomor telepon anda untuk mengakses Design List, Terima Kasih',
            'warning'
        )
    };
</script>

<main class="main pages">
    <div class="page-content pt-50 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <img src="https://indoprinting.co.id/assets/images/logo/favicon2.png" style="margin-left: 30%; margin-top: 2%;" />
                                    </div>
                                    <div class="col-md-9" style="margin-top: 3%;">
                                        <h6>{!! Auth()->user()->name ?? Auth()->user()->phone !!}</h6>
                                        <p>
                                            @if(Auth()->user()->membership > 0)
                                                Member Bronze
                                            @elseif(Auth()->user()->membership > 21)
                                                Member Silver
                                            @elseif(Auth()->user()->membership > 41)
                                                Member Gold
                                            @elseif(Auth()->user()->membership > 61)
                                                Member Platinum
                                            @else
                                                Member Bronze
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2" style="margin-top: 7px;">
                                        <img src="{{ asset('assets/images/icons/IDP-PAY.png') }}" style="margin-left: 4px;" alt="idp-pay logo" />
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="mt-2">
                                            <li>
                                                <a href="javascript:0;;" id="maintenance">
                                                    <p>IDP Pay</p>
                                                    <strong style="text-align: right">
                                                        @foreach($idp_pay as $ip)
                                                            {{ rupiah($ip['balance']) }}
                                                        @endforeach
                                                    </strong>
                                                </a>
                                            </li>
                                            <li class="mt-2">
                                                <a href="javascript:0;;" id="maintenance">
                                                    <p>IDP Points</p>
                                                    <strong>
                                                        @foreach($idp_pay as $ip)
                                                            {{ $ip['point'] }}
                                                        @endforeach
                                                    </strong>
                                                </a>
                                            </li>
                                            @if($affiliate->num_rows > 0)
                                                <li class="mt-2">
                                                    <a href="{{ route('report.affiliate') }}">
                                                        <p>Saldo Afiliasi</p>
                                                        <strong>
                                                            @foreach($affiliate as $af)
                                                                @if($af['affiliate_status'] == 'pending')
                                                                    <span class="badge bg-warning text-dark">Permintaan Tertunda</span>
                                                                @elseif($af['affiliate_status'] == 'review')
                                                                    <span class="badge bg-primary">Review Akun</span>
                                                                @elseif($af['affiliate_status'] == 'rejected')
                                                                    <span class="badge bg-danger">Permintaan Ditolak</span>
                                                                @elseif($af['affiliate_status'] == 'approved')
                                                                    {!! rupiah($af['affiliate_balance']) ?? 'Belum Bergabung' !!}
                                                                @endif
                                                            @endforeach
                                                        </strong>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="mt-2">
                                                    <a href="javascript:0;" id="not-join-affiliate">
                                                        <p>Saldo Afiliasi</p>
                                                        <strong>
                                                            Belum Bergabung
                                                        </strong>
                                                    </a>
                                                </li>
                                                <li class="mt-2">
                                                    <a href="{{ route('join.affiliate') }}">
                                                        <strong>
                                                            Bergabung Program Afiliasi
                                                        </strong>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-2" style="margin-top: 5px;">
                                        <img src="https://assets.tokopedia.net/asts/rewards/icons/RewardsSilver.svg" />
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="mt-2">
                                            <li>
                                                <a href="javascript:0;;" id="maintenance">
                                                    <h6>
                                                        @if(Auth()->user()->membership > 0)
                                                            Member Bronze
                                                        @elseif(Auth()->user()->membership > 21)
                                                            Member Silver
                                                        @elseif(Auth()->user()->membership > 41)
                                                            Member Gold
                                                        @elseif(Auth()->user()->membership > 61)
                                                            Member Platinum
                                                        @else
                                                            Member Bronze
                                                        @endif
                                                    </h6>
                                                </a>
                                            </li>
                                            <li class="mt-2">
                                                <a href="javascript:0;;" id="maintenance">
                                                    <p>Misi Seru</p>
                                                </a>
                                            </li>
                                            <li class="mt-2">
                                                <a href="javascript:0;;" id="maintenance">
                                                    <p>Games Seru</p>
                                                </a>
                                            </li>
                                            <li class="mt-2">
                                                <a href="javascript:0;;" id="maintenance">
                                                    <p>Kupon Saya</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                <strong>Kotak Masuk</strong>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><a href="javascript:0;;" style="color: #606f7b" id="maintenance">Chat</a></li>
                                                    <li><a href="javascript:0;;" style="color: #606f7b" id="maintenance">Diskusi Produk</a></li>
                                                    <li><a href="javascript:0;;" style="color: #606f7b" id="maintenance">Ulasan</a></li>
                                                    <li><a href="javascript:0;;" style="color: #606f7b" id="maintenance">Pesan Bantuan</a></li>
                                                    <li><a href="{{ route('queue.online') }}" style="color: #606f7b">Registrasi Pelayanan</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                <strong>Pembelian</strong>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><a href="https://studio.indoprinting.co.id/design-online" style="color: #606f7b">Daftar Design</a></li>
                                                    <li><a href="{{ route('profile') }}" style="color: #606f7b">Daftar Transaksi</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                <strong>Profile Saya</strong>
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <ul>
                                                    <li><a href="{{ route('checkout') }}" style="color: #606f7b">Lanjut Checkout</a></li>
                                                    <li><a href="{{ route('edit.profile') }}" style="color: #606f7b">Edit Profile</a></li>
                                                    <li><a href="{{ route('edit.password') }}" style="color: #606f7b">Edit Password</a></li>
                                                    <li><a href="{{ route('edit.address') }}" style="color: #606f7b">Edit Alamat</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card" style="height: 100%">
                                @yield('profile')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="requestIGCloud" tabindex="-1" aria-labelledby="withdrawalIDPPayLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('request.igcloud') }}" method="post">
                @csrf
                <input type="hidden" name="customer_id" value="{{ Auth()->user()->id }}" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request iGCloud</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="request_name" required />
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input class="form-control" type="number" name="request_number" value="{{ Auth()->user()->phone }}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input class="form-control" type="text" name="request_password" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small>Apa itu iGCloud? <a href="{{ route('ig.cloud') }}" target="_blank">Pelajari Disini</a></small>
                        <button type="submit" class="btn btn-primary">Request</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

@php
    $databaseHost = 'localhost';
    $databaseName = 'idp_w2p';
    $databaseUsername = 'idp_w2p';
    $databasePassword = 'Dur14n100$';
    $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $product_category_1 = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories ORDER BY id_category desc LIMIT 6");
@endphp
<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Tetap di rumah dan dapatkan kebutuhan Print Anda <br />
                                Mau ngeprint? di Indoprinting aja
                            </h2>
                            <p class="mb-45">Mulai Print kebutuhan Anda dengan <span class="text-brand">Indoprinting</span></p>
                            <form class="form-subcriber d-flex">
                                <input type="number" name="subcriber" placeholder="No Telp/WA" />
                                <button class="btn" type="submit">Berlangganan</button>
                            </form>
                        </div>
                        <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/banner/buku.png" style="width: 21%; margin-bottom: 10px;" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-1.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Banyak Diskon</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-2.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Harga Terbaik</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-3.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Dukungan</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-4.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Pelayanan Cepat</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-5.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Bergaransi</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-6.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Pengiriman Cepat</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="/" class="mb-15">
                                <img src="{{ asset('assets/images/logo/logofooter.png') }}" alt="logo indoprinting baru" />
                            </a>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-location.svg" alt="Indoprinting Semarang Indonesia" /> <span>Jl. Durian Raya No. 100, Banyumanik Semarang</span></li>
                            <li><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-email-2.svg" alt="Indoprinting Semarang Indonesia" /> <span><a href="mailto:onlineindoprinting@gmail.com" class="__cf_email__" data-cfemail="295a48454c69674c5a5d074a4644">onlineindoprinting@gmail.com</a></span></li>
                            <li><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-clock.svg" alt="Indoprinting Semarang Indonesia" /> <span><a href="{{ route('toko.kami') }}">Jam Kerja Cek Disini</a></span></li>
                            <li><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="Indoprinting Semarang Indonesia" /> <span>Dukungan 24 Jam / Pusat Layanan & Pelayanan Online</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">Company</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('toko.kami') }}">Toko Kami</a></li>
                    <li><a href="#">Kebijakan Pribadi</a></li>
                    <li><a href="{{ route('term') }}">Syarat &amp; Ketentuan</a></li>
                    <li><a href="#">Hubungi kami</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Pusat layanan</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="widget-title">Akun</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('login') }}">Masuk</a></li>
                    <li><a href="{{ route('cart') }}">Lihat Keranjang</a></li>
                    <li><a href="{{ route('wishlist') }}">Keinginanku</a></li>
                    <li><a href="{{ route('profile') }}">Lacak Pesanan</a></li>
                    <li><a href="{{ route('queue.online') }}">Antrian Online</a></li>
                    <li><a href="{{ route('edit.profile') }}">Profil Saya</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="widget-title">Corporate</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{ route('register.reseller') }}">Menjadi Reseller</a></li>
                    <li><a href="{{ route('register.creator') }}">Menjadi Creator</a></li>
                    <li><a href="{{ route('creator.list') }}">Daftar Creator</a></li>
                    <li><a href="{{ route('program.affiliate') }}">Program Afiliasi</a></li>
                    <li><a href="#">Aksesibilitas</a></li>
                    <li><a href="#">Promosi</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                <h4 class="widget-title">Kategori</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <?php foreach ($product_category_1 as $pc1) { ?>
                    <li><a href="{{ route('category', $pc1['id_category']) }}"><?= $pc1['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                <h4 class="widget-title">Instal Aplikasi</h4>
                <p class="">Dari App Store atau Google Play</p>
                <div class="download-app">
                    <a href="javascript:void(0);" class="hover-up mb-sm-2 mb-lg-0" id="app-store"><img class="active" src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/app-store.jpg" alt="" /></a>
                    <a href="javascript:void(0);" class="hover-up mb-sm-2" id="play-store"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/google-play.jpg" alt="" /></a>
                </div>
                <p class="mb-20">Metode Pembayaran Aman</p>
                <img class="" src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/payment-method.png" alt="" />
            </div>
        </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; {{ date('Y') != '2021' ? '2021-' . date('Y') : '2021' }}, <strong class="text-brand">Indoprinting</strong> All rights reserved <br />Hak Cipta dilindungi oleh Undang undang</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
{{--                <div class="hotline d-lg-inline-flex mr-30">--}}
{{--                    <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />--}}
{{--                    <p>0247499555<span>Jam Kerja 8:00 - 23:00</span></p>--}}
{{--                </div>--}}
{{--                <div class="hotline d-lg-inline-flex">--}}
{{--                    <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />--}}
{{--                    <p>082132003200<span>24/7 Support Center</span></p>--}}
{{--                </div>--}}
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Ikuti Kami</h6>
                    <a href="https://www.facebook.com/indoprinting.official" target="_blank"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="https://assets.infogotalent.com/indoprinting/indoprinting-new/frontend/assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>
                <p class="font-sm">Diskon hingga 30% untuk pendaftaran pertama</p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    document.getElementById('app-store').onclick = function() {
        Swal.fire(
            'Segera Hadir!',
            'Indoprinting App Akan Segera Hadir di App Store!',
            'warning'
        )
    };
</script>
<script type="text/javascript">
    document.getElementById('play-store').onclick = function() {
        Swal.fire(
            'Segera Hadir!',
            'Indoprinting App Akan Segera Hadir di Play Store!',
            'warning'
        )
    };
</script>
<script type="text/javascript">
    function lightMode(e) {
        document.getElementById("theme-active").style.background = '#FFFFFF';
        document.cookie = "theme-active=#FFFFF";
        location.reload();
    }
    function darkMode(e) {
        document.getElementById("theme-active").style.background = '#0C153B';
        document.cookie = "theme-active=#0C153B";
        location.reload();
    }
</script>

<!-- Preloader Start -->
{{--<div id="preloader-active">--}}
{{--    <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--        <div class="preloader-inner position-relative">--}}
{{--            <div class="text-center">--}}
{{--                <img src="{{ asset('nsm/') }}indoprinting-new/frontend/assets/imgs/theme/gif.gif" alt="Loader Indoprinting" />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Vendor JS-->
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/main.js?v=5.6') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/shop.js?v=5.6') }}"></script>
<script src="{{ asset('nsm/indoprinting-new/frontend/assets/js/nsm.js?v=5.6') }}"></script>
<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    document.getElementById('maintenance').onclick = function() {
        Swal.fire(
            'Maintenance!',
            'Mohon maaf, fitur ini sedang kami kembangkan, diharap untuk menunggu hingga selesai, Terima Kasih',
            'warning'
        )
    };
</script>
<script>
    function paymentMethod(e) {
        var payment_value = document.getElementById('wd_method').value;
        if (payment_value == 'tf') {
            document.getElementById("bank_name").style.display = 'block';
            document.getElementById("bank_rek").style.display = 'block';
            document.getElementById("bank_owner").style.display = 'block';
        } else {
            document.getElementById("bank_name").style.display = 'none';
            document.getElementById("bank_rek").style.display = 'none';
            document.getElementById("bank_owner").style.display = 'none';
        }
    }
</script>
<script type="text/javascript">
    document.querySelector("#not-join-affiliate").addEventListener('click', function(){
        Swal.fire(
            'Mohon Maaf!',
            'Silahkan bergabung ke program afiliasi terlebih dahulu untuk bisa mengakses saldo',
            'warning'
        )
    });
</script>
<script type="text/javascript">
    if (screen.width <= 768) {
        window.location = "https://app.indoprinting.co.id"+window.location.pathname+window.location.search;
    }
</script>
</body>

</html>

{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta content="width=device-width, initial-scale=1.0" name="viewport">--}}

{{--    <title>IDP | {{ $title ?? 'Cetak Expres, Harga Ngepres, Kualitas The Best' }}</title>--}}
{{--    <meta content="indoprinting" name="description">--}}
{{--    <meta content="indoprinting" name="keywords">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <!-- Favicons -->--}}
{{--    <link href="{{ asset('assets/images/logo/favicon.png') }}" rel="icon">--}}
{{--    <!-- Vendor CSS -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">--}}

{{--    <!-- Template Main CSS File -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/myStyle.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/input-file.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pagination.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/gmaps.css') }}">--}}

{{--    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/input-file.js') }}"></script>--}}
{{--</head>--}}

{{--<body>--}}
{{--    @include('layouts.header')--}}
{{--    <div class="content">--}}
{{--        <main>--}}
{{--            <x-breadcrumb title="{{ $title ?? 'Profilku' }}" />--}}
{{--            <div class="container-fluid">--}}
{{--                <section class="content">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-2">--}}
                            {{-- <a href="javascript:void(0);" id="lihat_profile" style="display: none;">Pengaturan Akun</a> --}}
{{--                            <div class="card shadow profile-cust mb-3">--}}
{{--                                <div class="card-body">--}}
{{--                                    <p style="font-size: 18px;"><strong>Profilku</strong></p>--}}
{{--                                    <ul class="list-profile">--}}
{{--                                        <li><a href="" class="icon-profile" style="font-size: 13px"><span class="icon-profile fab fa-shopify"></span> Daftar Belanja</a></li>--}}
{{--                                        <li><a href="" class="icon-profile" style="font-size: 13px"><span class="icon-profile fas fa-pencil"></span> My Design</a></li>--}}
{{--                                        <li><a href="" class="icon-profile" style="font-size: 13px"><span class="icon-profile fas fa-user"></span> Pengaturan Akun</a></li>--}}
{{--                                        <li><a href="" class="icon-profile2" style="font-size: 13px"><span class="icon-profile2 fas fa-house-user"></span> Alamat</a></li>--}}
{{--                                        <li><a href="" class="icon-profile2" style="font-size: 13px"><span class="icon-profile2 fas fa-key"></span> Ubah Password</a></li>--}}
{{--                                        <li><a href="" class="icon-profile" style="font-size: 13px"><span class="icon-profile fas fa-shopping-cart"></span> Checkout</a></li>--}}
{{--                                        <li><a href="" class="icon-profile"><span class="icon-profile fas fa-ticket-alt"></span> Registrasi Pelayanan Outlet</a></li>--}}
{{--                                    </ul>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-10">--}}
{{--                            @yield('profile')--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            </div>--}}
{{--        </main>--}}
{{--    </div>--}}

{{--    @include('layouts.footer_mobile')--}}
{{--    @include('layouts.footer')--}}
{{--    <!-- Vendor JS Files -->--}}
{{--    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>--}}

{{--    <!-- Main JS File -->--}}
{{--    <script src="{{ asset('assets/js/myJs.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/js/template.js') }}"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            let url = document.URL;--}}
{{--            $(".icon-profile")--}}
{{--                .filter(function() {--}}
{{--                    return this.href == url;--}}
{{--                }).css('color', '#e96c56');--}}

{{--            $(".icon-profile2")--}}
{{--                .filter(function() {--}}
{{--                    return this.href == url;--}}
{{--                }).css('color', '#e96c56');--}}
{{--        });--}}
{{--    </script>--}}
{{--    @include('layouts.tawk_to')--}}
{{--</body>--}}

{{--</html>--}}
