@extends('layouts.profile')
@section('profile')
    <x-alert />
    @if (count($orders) == 0)
        <div class="text-center">
            <div class="row mt-12" style="margin-top: 5%">
                <div class="col-md-12">
                    <img src="https://indoprinting.co.id/assets/images/icons/no-transaksi.png" />
                </div>
                <div class="col-md-12">
                    <h6>Belum ada transaksi</h6>
                </div>
                <div class="col-md-12">
                    <p>Yuk, mulai belanja dan penuhi berbagai<br> kebutuhan printingmu di Indoprinting.</p>
                </div>
                <div class="col-md-12 mt-2">
                    <a href="" class="btn btn-success">Mulai Belanja</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <div class="row mt-12" style="margin-top: 7%">
                @foreach ($orders as $id_o => $order)
                    <div class="profile-wrapper">
                        <div class="profile-inv">
                            @if ($order->payment_status == 'xxxxxx')
                                <form action="/batal-transaksi" method="POST" class="form_batal{{ $id_o }}">
                                    @csrf
                                    <input type="hidden" name="payment" value="{{ $order->payment_status }}">
                                    <input type="hidden" name="id" value="{{ $order->id_order }}">
                                    <input type="hidden" name="phone" value="{{ $order->cust_phone }}">
                                    <input type="hidden" name="invoice" value="{{ $order->no_inv }}">
                                    <a href="javascript:void(0);" class="submit_batal" data-cancel="{{ $id_o }}">Batalkan transaksi</a>
                                    <!-- <a href="javascript:void(0);" class="confirm">Batalkan transaksi</a> -->
                                </form>
                            @endif
                            <a href="javascript:void(0);" class="transaksi submit" data-payment="{{ $id_o }}">
                                @include('customer._step')
                            </a>
                            <div class="date-inv"><a href='{{ "/payment/download-invoice?invoice=$order->no_inv&phone=$order->cust_phone" }}' target="_blank">
                                    <strong>{{ dateID2($order->created_at) }} | {{ $order->no_inv }}</strong></a>
                            </div>

                        </div>
                        <hr>
                        <div class="profile-product">
                            @include('customer._data_product')
                        </div>
                        <hr>
                        <div class="profile-total">
                            <div>Total pembayaran <span class="float-right">{{ rupiah($order->total) }}</span></div>
                            @if ($order->shipping?->estimasi && $order->target)
                                <div style="font-weight: 700;font-size:12px;color:chocolate;">Estimasi Pesanan Dikirim
                                    <span class="float-right">{{ dateTime($order->target) }}</span>
                                </div>
                                <div style="font-weight: 700;font-size:12px;color:chocolate;">Estimasi Pesanan Sampai
                                    <span class="float-right">{{ estimasiDelivery($order->shipping->estimasi, $order->target) }}</span>
                                </div>
                            @else
                                <div style="font-weight: 700;font-size:12px;color:chocolate;">Estimasi Pesanan Terselesaian
                                    <span class="float-right">{{ $order->target ? dateTime($order->target) : 'Pesanan belum lunas' }}</span>
                                </div>
                            @endif
                            <div style="font-weight: 700;font-size:12px;color:chocolate;">Lokasi Pengambilan
                                <span class="float-right">{{ $order->pickup }}</span>
                            </div>
                            @if ($order->message)
                                <div style="font-size:12px">Pesan dari Indoprinting :</div>
                                <div style="font-weight: normal;font-size:12px">{{ $order->message }}</div>
                            @endif
                        </div>

                        <div class="profile-detail">
                            <form action="{{ route('paymentPage') }}" method="GET" class="myform{{ $id_o }}" target="_blank">
                                <input type="hidden" name="method" value="{{ $order->payment_method }}">
                                <input type="hidden" name="invoice" value="{{ $order->no_inv }}">
                                <input type="hidden" name="phone" value="{{ $order->cust_phone }}">
                                <button type="submit" class="transaksi submit text-success mb-2" data-payment="{{ $id_o }}">Detail transaksi</button>
                            </form>
                            {{-- <a href="/repeat-order/{{ $order->id_order }}" class="transaksi">Beli Lagi</a> --}}
                            <a href="{{ route('track.order.w2p', ['invoice' => $order->no_inv]) }}" class="transaksi" target="_blank">Tracking order</a>
                            @if ($order->sale_status == 'Completed' || $order->sale_status == 'Delivered')
                                <a href="javascript:void(0);" class="review" data-bs-toggle="modal" data-bs-target="#review{{ $id_o }}">Tulis review produk</a>
                                @include('customer._modal_review')
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


    <script>
        $(document).ready(function() {

            if (window.matchMedia("(max-width: 768px)").matches) {
                $("#lihat_profile").show();
            }

            $(".submit").click(function() {
                $(".myform" + $(this).data("payment")).submit();
            });
            $(".submit_batal").click(function() {
                let r = confirm("Delete invoice ?");
                if (r == true) {
                    console.log($(this).data("delete"));
                    $(".form_batal" + $(this).data("cancel")).submit();
                } else {
                    console.log('CANCEL');
                }
            });
            $('.img-tf').hide();
            $('.toggle-tf').on('click', function() {
                $('.img-tf').slideToggle();
                $('.bukti-tf').toggleClass("fas fa-chevron-up bukti-tf fas fa-chevron-down bukti-tf");
            });

            $('.status_order').on('click', function() {
                $(`#status${$(this).data("order")}`).slideToggle('fast');
            });

            $('#lihat_profile').on('click', function() {
                $('.profile-cust').slideToggle('fast');
            });
        });
    </script>
@endsection
