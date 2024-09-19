@extends('layouts.main')
@section('main')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Keranjang
                </div>
            </div>
        </div>
        <x-alert />
        @if (count($carts) > 0)
            <div class="container mb-80 mt-50">
                <div class="row">
                    <div class="col-lg-8 mb-40">
                        <h1 class="heading-2 mb-10">Keranjang</h1>
                        <div class="d-flex justify-content-between">
                            <h6 class="text-body">Ada <span class="text-brand"><?php setcookie('cart_total', count($carts)) ?><?= count($carts) ?></span> produk di keranjang Anda</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-responsive shopping-summery">
                            <table class="table table-wishlist">
                                <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">No</th>
                                    <th scope="col" colspan="2">Produk & Info</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col" class="end">Hapus</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('cart._cart')
                                </tbody>
                            </table>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="cart-action d-flex justify-content-between">
                            <a class="btn" href="/"><i class="fi-sr-arrow-left mr-10"></i>Lanjut Belanja</a>
                            <a class="btn mr-10 mb-sm-15" id="update-cart"><i class="fi-sr-refresh mr-10"></i>Perbarui Keranjang</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border p-md-4 cart-totals ml-30">
                            <div class="table-responsive">
                                <table class="table no-border">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ rupiah($total) }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    @guest
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Discount</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">
                                                    {{ rupiah($discount) }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                    @endguest
                                    @auth
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="text-muted">Discount</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                <h4 class="text-brand text-end">
                                                    {{ rupiah($discount) }}
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="2">
                                                <div class="divider-2 mt-10 mb-10"></div>
                                            </td>
                                        </tr>
                                    @endauth
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">
                                                @php
                                                    $sum = 0;
                                                    $sum = $total - $discount
                                                @endphp
                                                {{ rupiah($sum) }}
                                            </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
{{--                            <a href="{{ $total - $discount > 11000 ? route('checkout') : '#' }}" id="{{ $total - $discount > 1 ? 'notif' : 'checkout' }}" class="btn mb-20 w-100">Lanjut Checkout <i class="fi-sr-arrow-right mr-10"></i></a>--}}
                            <a href="{{ $total > 11000 ? route('checkout') : '#' }}" class="btn mb-20 w-100">Lanjut Checkout <i class="fi-sr-arrow-right mr-10"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-60 mb-60">
                <div class="col-12">
                    <h2 class="section-title style-1 mb-30">Rekomendasi untukmu</h2>
                </div>
                <div class="col-12">
                    <div class="row related-products">
                        @foreach ($relates as $relate)
                            <div class="col-lg-2 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product', $relate->id_product) }}" tabindex="0">
                                                <img class="default-img" src="{{ adminUrl('assets/images/products-img/' . $relate->thumbnail) }}" alt="{{ $relate->name }}">
                                                <img class="hover-img" src="{{ adminUrl('assets/images/products-img/' . $relate->thumbnail) }}" alt="{{ $relate->name }}">
                                            </a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hemat 30%</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('product', $relate->id_product) }}" tabindex="0">{{ $relate->name }}</a></h2>
                                        {{ $relate->review_avg_rating ?? 0 }} <i class="fi fi-sr-star text-warning"></i> | Terjual {{ soldThousand($relate->best_seller_sum_qty) ?? 0 }}
                                        <div class="product-price">
                                            mulai dari <span>{{ rupiah($relate->min_price) }} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="row" style="text-align: center; margin-top: 70px; margin-bottom: 170px;">
                <center>
                    <img src="https://indoprinting.co.id/nsm/indoprinting-new/frontend/assets/imgs/custom/img.jpg" style="width: 17%;" />
                </center>
                <?php setcookie('cart_total', 0) ?>
                <h3>Wah, keranjang belanjamu kosong</h3>
                <p>Yuk, isi dengan barang-barang impianmu!</p>
                <div style="text-align: center;">
                    <a class="btn btn-success btn-sm" href="/">Mulai Belanja</a>
                </div>
            </div>
        @endif
        <script>
            document.getElementById('update-cart').onclick = function() {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Memperbarui!',
                    html: 'Proses selesai dalam <b></b> detik.',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = (Swal.getTimerLeft() / 1000).toFixed(0)
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        location.reload()
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('Saya ditutup oleh timer')
                    }
                })
            };
            $(document).ready(function() {
                $('#notif').on('click', function() {
                    alert('Mohon maaf, untuk melanjutkan checkout minimal belanja Rp 11.000');
                });
                $('#checkout').on('click', function() {
                    document.cookie = "nsm_from_cart=02e77c4d77d41a5f2ee74f56cb74def6";
                });
                let owl = $('.owl-carousel');
                if (window.matchMedia("(max-width: 767px)").matches) {
                    owl.owlCarousel({
                        items: 2,
                        loop: true,
                        margin: 10,
                        autoplay: false,
                        autoplayTimeout: 1500,
                        autoplayHoverPause: true,
                        dots: true,
                    });
                } else {
                    owl.owlCarousel({
                        items: 5,
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout: 1500,
                        autoplayHoverPause: true,
                        dots: false,
                    });
                }
            });
        </script>
    </main>
@endsection
