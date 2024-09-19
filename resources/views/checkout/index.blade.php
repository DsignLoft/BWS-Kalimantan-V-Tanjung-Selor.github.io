@extends('layouts.main')
@section('main')
    <?php setcookie('nsm_from_cart', '') ?>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > <a href="{{ route('cart') }}" rel="nofollow">Keranjang</a>
                    > Checkout
                </div>
            </div>
        </div>
        <x-alert />
        <x-auth.validate-error :errors="$errors" />
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Checkout</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">Ada <span class="text-brand"><?= count($carts) ?></span> produk di daftar pesanan anda</h6>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('payment') }}" id="form-checkout">
                @csrf
                <input type="hidden" name="berat" value="{{ $berat }}">
                <input type="hidden" name="total" id="total_temp" value="{{ $total }}">
                <input type="hidden" name="discount" id="discount" value="{{ $discount }}">

                <?php if (isset($_COOKIE['affiliate_use']) && isset($_COOKIE['affiliate_code']) && isset($_COOKIE['affiliate_unique'])) { ?>
                <input type="hidden" name="ac" value="<?= $_COOKIE['affiliate_code'] ?>">
                <input type="hidden" name="au" value="<?= $_COOKIE['affiliate_unique'] ?>">
                <?php } else { ?>
                <input type="hidden" name="ac" value="0">
                <input type="hidden" name="au" value="0">
                <?php } ?>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="row mb-50">
                            <div class="col-lg-6 mb-sm-15 mb-lg-0 mb-md-3">
                                <?php if (isset($_COOKIE['affiliate_use']) && isset($_COOKIE['affiliate_code']) && isset($_COOKIE['affiliate_unique'])) { ?>
                                    <?php if ($_COOKIE['affiliate_use'] == 1) { ?>
                                <div class="toggle_info">
                                        <span>
                                            <i class="fi-sr-user mr-10"></i>
                                            <span class="text-muted font-lg">
                                                <?= $_COOKIE['affiliate_code'] ?>
                                            </span>
                                            <a href="#afilliasi" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">
                                                Reset
                                            </a>
                                        </span>
                                </div>
                                <?php } else { ?>
                                <div class="toggle_info">
                                        <span>
                                            <i class="fi-sr-user mr-10"></i>
                                            <span class="text-muted font-lg">
                                                Punya Kode Referral?
                                            </span>
                                            <a href="#afilliasi" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">
                                                Gunakan kode
                                            </a>
                                        </span>
                                </div>
                                <?php } ?>

                                <?php } else { ?>
                                <div class="toggle_info">
                                        <span>
                                            <i class="fi-sr-user mr-10"></i>
                                            <span class="text-muted font-lg">
                                                Punya Kode Referral?
                                            </span>
                                            <a href="#afilliasi" data-bs-toggle="collapse" class="collapsed font-lg" aria-expanded="false">
                                                Gunakan kode
                                            </a>
                                        </span>
                                </div>
                                <?php } ?>

                                <div class="panel-collapse collapse login_form" id="afilliasi">
                                    <div class="panel-body">

                                        <?php if (isset($_COOKIE['affiliate_use']) && isset($_COOKIE['affiliate_code']) && isset($_COOKIE['affiliate_unique'])) { ?>

                                            <?php if ($_COOKIE['affiliate_use'] == 1) { ?>
                                        <p class="mb-30 font-sm">Anda telah menggunakan Kode Referral dengan kode berikut <?= $_COOKIE['affiliate_code'] ?>, Silahkan reset kode terlebih dahulu untuk mengganti Kode Referral yang baru, Terima Kasih</p>
                                        <form method="post" action="{{ route('use.affiliate') }}" style="display: none">
                                            @csrf
                                            <div class="form-group" style="display: none">
                                                <input type="text" name="affiliate_code" placeholder="Kode Referral">
                                            </div>
                                            <div class="login_footer form-group" style="display: none">
                                                <div class="check-form">
                                                    <a href="" target="_blank"></a>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <button type="submit" class="btn btn-md">Gunakan Kode</button>
                                            </div>
                                        </form>
                                        <a href="{{ route('reset.affiliate', ['affiliate_code' => $_COOKIE['affiliate_code']]) }}" class="btn btn-md">Reset Kode</a>

                                        <?php } else { ?>


                                        <p class="mb-30 font-sm">Jika anda memiliki Kode Referral, silahkan gunakan Kode Referral anda untuk mendapatkan saldo IDP Pay di setiap transaksi yang anda lakukan, Terima Kasih</p>
                                        <form method="post" action="{{ route('use.affiliate') }}" style="display: none">
                                            @csrf
                                            <div class="form-group" style="display: none">
                                                <input type="text" name="affiliate_code" placeholder="Kode Referral">
                                            </div>
                                            <div class="login_footer form-group" style="display: none">
                                                <div class="check-form">
                                                    <a href="" target="_blank"></a>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <button type="submit" class="btn btn-md">Gunakan Kode</button>
                                            </div>
                                        </form>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#codeAffiliate" class="btn btn-md">Gunakan Kode Referral</button>
                                        <div class="modal fade" id="codeAffiliate" tabindex="-1" aria-labelledby="codeAffiliateLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="{{ route('use.affiliate') }}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Kode Referral</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" name="affiliate_code" placeholder="Kode Referral">
                                                            <a href="" target="_blank">Lupa kode Referral? klik disini</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Gunakan Kode</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                        <?php } else { ?>
                                        <p class="mb-30 font-sm">Jika anda memiliki Kode Referral, silahkan gunakan Kode Referral anda untuk mendapatkan saldo IDP Pay di setiap transaksi yang anda lakukan, Terima Kasih</p>
                                        <form method="post" action="{{ route('use.affiliate') }}" style="display: none">
                                            @csrf
                                            <div class="form-group" style="display: none">
                                                <input type="text" name="affiliate_code" placeholder="Kode Referral">
                                            </div>
                                            <div class="login_footer form-group" style="display: none">
                                                <div class="check-form">
                                                    <a href="" target="_blank"></a>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <button type="submit" class="btn btn-md">Gunakan Kode</button>
                                            </div>
                                        </form>

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#codeAffiliate" class="btn btn-md">Gunakan Kode Referral</button>
                                        <div class="modal fade" id="codeAffiliate" tabindex="-1" aria-labelledby="codeAffiliateLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" action="{{ route('use.affiliate') }}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Kode Referral</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" name="affiliate_code" placeholder="Kode Referral">
                                                            <a href="" target="_blank">Lupa Kode Referral? klik disini</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Gunakan Kode</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <?php if (isset($_COOKIE['redeem_status'])) { ?>

                                    <?php if ($_COOKIE['redeem_status'] == 1) { ?>
                                <form method="post" class="apply-coupon" action="{{ route('reset.voucher') }}">
                                    @csrf
                                    <input type="text" name="redeem_code" value="<?= $_COOKIE['redeem_code']; ?>" readonly>
                                    <button class="btn  btn-md" type="submit">Reset</button>
                                </form>
                                <?php } else { ?>
                                <form method="post" class="apply-coupon" action="{{ route('redeem.voucher') }}">
                                    @csrf
                                    <input type="text" name="redeem_code" placeholder="Masukkan kode kupon...">
                                    <button class="btn  btn-md" type="submit">Terapkan</button>
                                </form>
                                <?php } ?>

                                <?php } else { ?>
                                <form method="post" class="apply-coupon" action="{{ route('redeem.voucher') }}">
                                    @csrf
                                    <input type="text" name="redeem_code" placeholder="Masukkan kode kupon...">
                                    <button class="btn  btn-md" type="submit">Terapkan</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>

                        @auth
                            <?php
                            $databaseHost = 'localhost';
                            $databaseName = 'idp_w2p';
                            $databaseUsername = 'idp_w2p';
                            $databasePassword = 'Dur14n100$';
                            $w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

                            $get_voucher = mysqli_query($w2p, "SELECT * FROM nsm_voucher WHERE customer_id='".Auth()->user()->id_customer."'");
                            $check_voucher = mysqli_num_rows($get_voucher);
                            if ($check_voucher > 0 ) { ?>
                            <div class="row mb-20">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>
                            <?php } else { ?>
                            <div class="row mb-20">
                                <div class="col-md-12"></div>
                            </div>
                            <?php } ?>
                        @endauth

                        @include('checkout._data_pelanggan')
                        @include('checkout._pengiriman')
                        @auth
                            @include('checkout._kurir')
                        @endauth
                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-12">
                                <div class="custom_select">
                                    <select class="form-control" name="payment_method" id="payment_method" onclick="getPaymentMethod()">
                                        <option value="">Pilih pembayaran...</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="Qris">Qris (Gopay, Ovo, ShopeePay, dll)</option>
                                        @auth
                                            <option value="IDPPay">IDP Pay</option>
                                        @endauth
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="border p-40 cart-totals ml-30 mb-50">
                            <div class="d-flex align-items-end justify-content-between mb-30">
                                <h4>Pesanan Anda</h4>
                                <h6 class="text-muted">Subtotal</h6>
                            </div>
                            <div class="divider-2 mb-30"></div>
                            <div class="table-responsive order_table checkout">
                                <table class="table no-border">
                                    <tbody>
                                    @include('cart._checkout')
                                    </tbody>
                                </table>
                                <div class="total-price">
                                    <div class="text2">
                                        <h6>Ongkir <span class="float-right" id="harga_ongkir">Rp 0</span></h6>
                                    </div>
                                    <div class="text2">
                                        <h6>Subtotal
                                            <span class="float-right">
                                                {{ rupiah($total) }}
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="text2">
                                        <h6>Discount
                                            <span class="float-right">
                                                {{ rupiah($discount) }}
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="text2">
                                        <h6 style="font-family: 'Arial Black'">Total Tagihan
                                            <span class="float-right">
                                                @php
                                                    $sum = 0;
                                                    $sum = $total - $discount
                                                @endphp
                                                {{ rupiah($sum) }}
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment ml-30">
                            <a href="javascript:void(0);" id="submit" style="display: none" class="btn btn-fill-out btn-block mt-30">Bayar Sekarang<i class="fi-sr-angle-circle-right ml-15"></i></a>
                            <a href="javascript:0;" id="no-submit" style="display: block" class="btn btn-fill-out btn-block mt-30">Bayar Sekarang<i class="fi-sr-angle-circle-right ml-15"></i></a>
                            @php
                                $get_balance = DB::table('idp_customers')->where('id_customer', Auth()->id())->value('balance');
                                    if ($get_balance > $sum) {
                                        echo "<a href='javascript:0;' id='submit' style='display: none' class='btn btn-fill-out btn-block mt-30'>Bayar Sekarang<i class='fi-sr-angle-circle-right ml-15'></i></a>";
                                    } else {
                                        echo "<a href='javascript:0;' id='idp-pay' style='display: none' class='btn btn-fill-out btn-block mt-30'>Bayar Sekarang<i class='fi-sr-angle-circle-right ml-15'></i></a>";
                                    }
                            @endphp
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="{{ asset('assets/js/checkout.js') }}"></script>
    <script type="text/javascript">
        function getPaymentMethod(e) {
            var payment_method = document.getElementById('payment_method').value;
            if (payment_method == '') {
                document.getElementById("no-submit").style.display = 'block';
                document.getElementById("submit").style.display = 'none';
            } else if (payment_method == 'IDPPay') {
                document.getElementById("idp-pay").style.display = 'block';
                document.getElementById("submit").style.display = 'none';
                document.getElementById("no-submit").style.display = 'none';
            } else if (payment_method == 'Transfer') {
                document.getElementById("no-submit").style.display = 'none';
                document.getElementById("submit").style.display = 'block';
            } else if (payment_method == 'Qris') {
                document.getElementById("no-submit").style.display = 'none';
                document.getElementById("submit").style.display = 'block';
            } else if (payment_method == 'Cash') {
                document.getElementById("no-submit").style.display = 'none';
                document.getElementById("submit").style.display = 'block';
            }
        }
    </script>
    <script type="text/javascript">
        document.getElementById('no-submit').onclick = function() {
            Swal.fire(
                'Mohon Maaf!',
                'Silahkan Memilih Metode Pembayaran Terlebih Dahulu!',
                'error'
            )
        }
        document.getElementById('idp-pay').onclick = function() {
            Swal.fire(
                'Mohon Maaf!',
                'Saldo IDP Pay anda tidak mencukupi untuk melakukan checkout',
                'error'
            )
        }
    </script>
    @auth
        <script type="text/javascript">
            function getDeliveryChooice(e) {
                var delivery_value = document.getElementById("pickup-method").value;
                if (delivery_value == "") {
                    document.getElementById("alamat-outlet").style.display = 'none';
                    document.getElementById("ongkos-kirim").style.display = 'none';
                } else if (delivery_value == "Self-pickup") {
                    document.getElementById("alamat-outlet").style.display = 'block';
                    document.getElementById("ongkos-kirim").style.display = 'none';
                } else if (delivery_value == "Delivery") {
                    document.getElementById("alamat-outlet").style.display = 'none';
                    document.getElementById("ongkos-kirim").style.display = 'block';
                }
            }
        </script>
    @endauth
@endsection
