<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>
    <style>
        .print-wrap {
            /* display: block; */
            /* margin-top: 10px; */
            width: 100%;
            padding: 20px;
            font-size: 16px;
        }

        .print-wrap .hr {
            border-bottom: 1px solid #000;
            margin-bottom: 10px;
        }


        .print-wrap .logo-idp img {
            max-width: 50%;
            margin-bottom: 4%;
            /* max-height: 40%; */
        }

        .print-wrap .invoice {
            /* max-width: 100%; */
            border: 1px solid black;
            padding: 10px;
            border-radius: 8px;
        }

        .print-wrap .dashed {
            margin: 10px 0;
            border-bottom: 1px dashed black;
        }

        .print-wrap .table {
            margin-bottom: 0;
        }

        .print-wrap .table td {
            border-top: none;
            padding: 2px;
        }

        .print-wrap .pembayaran {
            width: auto;
            border: 1px solid black;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .print-wrap .pembayaran h3 {
            color: #e6583f;
        }

        .print-wrap .total {
            font-size: 18px;
            font-weight: 700;
            margin-left: 40%;
            width: auto;
            border: 1px solid black;
            padding: 10px;
            border-radius: 8px;
        }

        .print-wrap .signature-wrap {
            text-align: center;
            margin: 10px auto;
        }

        .table-signa {
            width: 100%;
            text-align: center;
            margin-top: 20px;
            background-image: url("assets/images/admin/stamp.png");
            background-position: center top;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact;
        }

        .print-wrap .logo-idp {
            text-align: center;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            min-height: 100px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .float-right {
            float: right;
        }

    </style>
</head>

<body>
    <!-- <div class="head-print"> -->
    <div class="container">
        @if(!intval($order->items))
            <div class="print-wrap">
                <div class="logo-idp">
                    <img src="{{ adminUrl('assets/images/logo/invoice.png') }}">
                </div>
                <div class="invoice">
                    <div class="row">
                        <div class="column">
                            <table class="table table-responsive">
                                <tr>
                                    <td style="width: 20%">Nama</td>
                                    <td>: {{ $order->cust_name }}</td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>: {{ $order->cust_phone }}</td>

                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>: {{ $order->cust_email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pickup</td>
                                    <td>: {{ $order->pickup }}</td>
                                </tr>
                            </table>

                        </div>
                        <div class="column">
                            <table class="table table-responsive">
                                <tr>
                                    <td width="20%">No. Invoice</td>
                                    <td>: {{ $order->no_inv }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Order</td>
                                    <td>: {{ dateTime($order->created_at) }}</td>

                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>: {{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td {{ $data_erp->sale->payment_status == 'Paid'? 'style="color: green;font-weight:700"': 'style="color: red;font-weight:700"' }}>: <?= $data_erp->sale->payment_status ?></td>
                                </tr>
                                <tr>
                                    <td>Estimasi</td>
                                    <td>
                                        @if($order->waiting_production == null || $order->waiting_production == "")
                                            : Menunggu Pembayaran
                                        @else
                                            : {{ $data_erp->sale->est_complete_date ? dateTimeID($data_erp->sale->est_complete_date) : 'Menunggu Pembayaran' }}
                                        @endif
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="dashed"></div>
                <div class="dashed"></div>
                <div class="pembayaran table-responsive">
                    <h3>Rincian Belanja</h3>
                    <div class="rincian">
                        @foreach (json_decode($order->items) as $item)
                            <div>
                                <strong>{{ $item->name }}</strong>
                                <span style="float:right;">{{ rupiah($item->price) }}</span>
                            </div>
                            <div style="display: block;margin-bottom:10px">
                                <ul>
                                    <li>
                                        <div>Kuantitas : {{ $item->qty }} Pcs</div>
                                    </li>
                                    @foreach (json_decode($item->attributes)->jenis_atb as $id_atb => $name)
                                        <li>{{ $name }} : {{ json_decode($item->attributes)->nama_atb[$id_atb] }}</li>
                                    @endforeach
                                    <li>Note : {!! $item->product_note !!}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="hr"></div>
                    <div>
                        <strong>Total Belanja</strong>
                        <span class="float-right">{{ rupiah($order->total) }}</span>
                    </div>
                </div>

                @if($order->discount != null)
                    <div class="total" style="margin-bottom: 4px;">
                        <div style="color: red;">
                            <strong>
                                Discount
                            </strong>
                            <span class="float-right">{{ rupiah($order->discount) }}</span>
                        </div>
                    </div>
                @endif

                <div class="total">
                    @if ($order->payment_method == 'Transfer')
                        @isset($harga_kurir)
                            <div>
                                <strong>
                                    Kode Unik
                                </strong>
                                <span class="float-right">{{ $data_erp->payment_validation->unique_code }}</span>
                            </div>
                        @endisset
                        <div style="color: blueviolet;">
                            <strong>
                                Kode Unik
                            </strong>
                            <span class="float-right">{{ $data_erp->payment_validation->unique_code }}</span>
                        </div>
                        <div>
                            <strong>
                                Total Pembayaran
                            </strong>
                            <span class="float-right">{{ rupiah($data_erp->payment_validation->transfer_amount) }}</span>
                        </div>
                    @else
                        <div>
                            Total Pembayaran
                            <span class="float-right">{{ rupiah($data_erp->sale->grand_total) }}</span>
                        </div>
                    @endif
                </div>
                <table class="table-signa">
                    <tr>
                        <td>Customer Service</td>
                        <td>Operator</td>
                    </tr>
                    <tr class="stamp">
                        <td style="padding-top: 50px;">............................................</td>
                        <td style="padding-top: 50px;">............................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 10px;">
                            Mohon cermati text, ukuran dan quantity pesanan anda, <strong>karena nota tidak bisa dilakukan revisi setelah dicetak</strong>.
                            Barang pesanan dalam waktu 1 bulan tidak diambil akan disumbangkan kepada yang membutuhkan.
                            <strong>Terima kasih telah menjadi pelanggan kami, jika ada masukkan silakan WhatsApp ke 081327043234</strong>
                        </td>
                    </tr>
                </table>
            </div>
        @else
            <div class="print-wrap">
                <div class="logo-idp">
                    <img src="{{ adminUrl('assets/images/logo/invoice.png') }}">
                </div>
                <div class="invoice">
                    <div class="row">
                        <div class="column">
                            <table class="table table-responsive">
                                <tr>
                                    <td style="width: 20%">Nama</td>
                                    <td>: {{ $order->cust_name }}</td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>: {{ $order->cust_phone }}</td>

                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>: {{ $order->cust_email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $order->address }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pickup</td>
                                    <td>: {{ $order->pickup }}</td>
                                </tr>
                            </table>

                        </div>
                        <div class="column">
                            <table class="table table-responsive">
                                <tr>
                                    <td width="20%">No. Invoice</td>
                                    <td>: {{ $order->no_inv }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Order</td>
                                    <td>: {{ dateTime($order->created_at) }}</td>

                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>: {{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td {{ $data_erp->sale->payment_status == 'Paid'? 'style="color: green;font-weight:700"': 'style="color: red;font-weight:700"' }}>: <?= $data_erp->sale->payment_status ?></td>
                                </tr>
                                <tr>
                                    <td>Estimasi</td>
                                    <td>: {{ $data_erp->sale->est_complete_date ? dateTimeID($data_erp->sale->est_complete_date) : 'Belum Lunas' }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="dashed"></div>
                <div class="dashed"></div>
                <div class="pembayaran table-responsive">
                    <h3>Rincian Belanja</h3>
                    <div class="rincian">
                        @foreach (json_decode($order->items) as $item)
                            <div>
                                <strong>{{ $item->name }}</strong>
                                <span style="float:right;">{{ rupiah($item->price) }}</span>
                            </div>
                            <div style="display: block;margin-bottom:10px">
                                <ul>
                                    <li>
                                        <div>Kuantitas : {{ $item->qty }} Pcs</div>
                                    </li>
                                    @foreach (json_decode($item->attributes)->jenis_atb as $id_atb => $name)
                                        <li>{{ $name }} : {{ json_decode($item->attributes)->nama_atb[$id_atb] }}</li>
                                    @endforeach
                                    <li>Note : {!! $item->product_note !!}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    <div class="hr"></div>
                    <div>
                        <strong>Total Belanja</strong>
                        <span class="float-right">{{ rupiah($order->total) }}</span>
                    </div>
                    @if($order->discount != 0)
                        <div class="mt-2">
                            <strong>Discount</strong>
                            <span class="float-right">{{ rupiah($order->discount) }}</span>
                        </div>
                    @endif
                </div>
                <div class="total">
                    @if ($order->payment_method == 'Transfer')
                        @if($order->discount != 0)
                            <div style="color: red;">
                                <strong>
                                    Discount
                                </strong>
                                <span class="float-right">{{ rupiah($order->discount) }}</span>
                            </div>
                        @endif
                        @isset($harga_kurir)
                            <div>
                                <strong>
                                    Kode Unik
                                </strong>
                                <span class="float-right">{{ $data_erp->payment_validation->unique_code }}</span>
                            </div>
                        @endisset
                        <div style="color: blueviolet;">
                            <strong>
                                Kode Unik
                            </strong>
                            <span class="float-right">{{ $data_erp->payment_validation->unique_code }}</span>
                        </div>
                        <div>
                            <strong>
                                Total Pembayaran
                            </strong>
                            <span class="float-right">{{ rupiah($data_erp->payment_validation->transfer_amount) }}</span>
                        </div>
                    @else
                        <div>
                            Total Pembayaran
                            <span class="float-right">{{ rupiah($data_erp->sale->grand_total) }}</span>
                        </div>
                    @endif
                </div>
                <table class="table-signa">
                    <tr>
                        <td>Customer Service</td>
                        <td>Operator</td>
                    </tr>
                    <tr class="stamp">
                        <td style="padding-top: 50px;">............................................</td>
                        <td style="padding-top: 50px;">............................................</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 10px;">
                            Mohon cermati text, ukuran dan quantity pesanan anda, <strong>karena nota tidak bisa dilakukan revisi setelah dicetak</strong>.
                            Barang pesanan dalam waktu 1 bulan tidak diambil akan disumbangkan kepada yang membutuhkan.
                            <strong>Terima kasih telah menjadi pelanggan kami, jika ada masukkan silakan WhatsApp ke 081327043234</strong>
                        </td>
                    </tr>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
