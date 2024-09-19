@extends('layouts.main')
@section('main')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/myStyle.css') }}">
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Tracking Order
                </div>
            </div>
        </div>
        <x-alert />
        <div class="row">
            @if ($data)
                @php
                    $customer = $data->customer;
                    $sale = $data->sale;
                    $sale_items = $data->sale_items;
                    $payment_validation = $data->payment_validation ?? null;
                    $pic = $data->pic ?? null;
                @endphp
                <div class="container-fluid">
                    <section class="content">
                        <div class="row">

                            @include('tracking_order._customer_info')

                            <div class="col-md-9">
                                <div class="profile-wrapper" style="padding:20px">
                                    <div class="profile-inv">

                                        @include('tracking_order._step')

                                        <div class="date-inv"><strong>{{ dateID2($sale->date) }} | {{ $sale->no }}</strong></div>
                                    </div>
                                    <hr>
                                    @foreach ($sale_items as $item)
                                        <div class="ml-2">
                                            <div class="font-weight-bold">{{ $item->product_name }}</div>
                                            <div class="ml-2">Qty : {{ $item->quantity }}</div>
                                            @if ($item->product_code != null)
                                            @else
                                                @if ($item->length != 0 && $item->width != 0)
                                                    <div class="ml-2 font-weight-bold">Ukuran : {{ $item->length . ' x ' . $item->width . ' M' }}</div>
                                                @endif
                                            @endif
                                            @if ($item->spec)
                                                <div class="ml-2">Item note : {!! $item->spec !!}</div>
                                            @endif
                                            <div class="mb-2 ml-2">Harga : {{ rupiah($item->subtotal) }}</div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="profile-total">
                                        {{-- @if ($sale->payment_due_date < date('Y-m-d H:i:s') && $sale->payment_status != 'Paid')
                                            <div class="text-danger text-center">Pembayaran sudah jatuh tempo, silahkan order ulang.</div>
                                        @else --}}
                                        <div>Total pembayaran <span class="float-right">{{ $payment_validation ? rupiah($payment_validation->transfer_amount) : rupiah($sale->grand_total) }}</span></div>
                                        <div style="font-weight: 700font-size:12pxcolor:chocolate">Estimasi Pesanan Terselesaian
                                            <span class="float-right">
                                            @if (!$sale->est_complete_date)
                                                    <div class="text-danger">Pesanan belum lunas</div>
                                                @elseif ($sale->status == 'Preparing')
                                                    <div class="text-info">Pesanan sedang diproses</div>
                                                @else
                                                    {{ dateTimeID2($sale->est_complete_date) }}
                                                @endif
                                        </span>
                                        </div>
                                        {{-- @endif --}}
                                    </div>
                                    {{-- @if ($sale->payment_due_date < date('Y-m-d H:i:s') && $sale->payment_status != 'Paid')
                                        <div class="profile-detail">
                                            <a href="/" class="transaksi" style="font-size: 18px">Order Online</a>
                                        </div>
                                    @else --}}
                                    <div class="profile-detail">
                                        <a href=" javascript:void(0)" class="transaksi" data-bs-toggle="modal" data-bs-target="#transaksiModal">Detail transaksi</a>
                                        @include('tracking_order._modal_transaksi')

                                        @if ($order)
                                            <a href="javascript:void(0);" class="transaksi" data-bs-toggle="modal" data-bs-target="#uploadFile">
                                                Bukti pembayaran
                                            </a>
                                            @include('payment._upload_bukti_tf')
                                        @endif

                                        @if ($kurir != [])
                                            <a href=" javascript:void(0)" class="transaksi" data-bs-toggle="modal" data-bs-target="#kurirModal">Lacak kurir</a>

                                            @include('tracking_order._modal_kurir')
                                        @endif
                                    </div>
                                    {{-- @endif --}}
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            @else
                <div class="wrapper-track mb-20 mt-20">
                    <form method="GET">
                        <h4 class="text-center">No. Invoice</h4>
                        <input style="max-width: 50%; margin-left: 25%; margin-top: 10px;" type="text" name="invoice" required>
                        <div class="text-center mt-3">
                            <button class="btn btn-info w-50">Tracking</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </main>

    <script src="{{ asset('assets/js/tracking_order.js') }}"></script>

@endsection
