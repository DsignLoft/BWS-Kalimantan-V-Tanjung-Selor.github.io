<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-content pt-50 pb-370" style="margin-bottom: 20%">
            <div class="container">
                <div class="row">
                    <x-alert />
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="https://images.tokopedia.net/img/deposit/saldo-green@2x.png" alt="" style="margin-top: 70%;" />
                                                    </div>
                                                    <div class="col-md-9" style="margin-top: 6%;">
                                                        <div class="col-md-12">
                                                            <small>Total Saldo Afiliasi</small>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?php
                                                            $get_balance = mysqli_query($connect_w2p, "SELECT * FROM nsm_affiliate WHERE customer_id=".Auth()->user()->id_customer." LIMIT 1");
                                                            if ($get_balance->num_rows > 0) {
                                                                foreach($get_balance as $gb) {
                                                                    echo "<h4>".rupiah($gb['affiliate_balance'])."</h4>";
                                                                }
                                                            } else {
                                                                echo "<h4>".rupiah(0)."</h4>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-success" style="margin-top: 10%;">Tarik Saldo</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left">
                                                Saldo Penghasilan
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                <?php
                                                $get_balance = mysqli_query($connect_w2p, "SELECT * FROM nsm_affiliate WHERE customer_id=".Auth()->user()->id_customer." LIMIT 1");
                                                if ($get_balance->num_rows > 0) {
                                                    foreach($get_balance as $gb) {
                                                        echo rupiah($gb['affiliate_balance']);
                                                    }
                                                } else {
                                                    echo rupiah(0);
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6" style="text-align: left">
                                                Penarikan Saldo
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                Rp 0
                                            </div>
                                            <div class="col-md-6" style="text-align: left">
                                                Komisi
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                <?php
                                                $get_referral = mysqli_query($connect_w2p, "SELECT * FROM nsm_affiliate WHERE customer_id=".Auth()->user()->id_customer." LIMIT 1");
                                                if ($get_referral->num_rows > 0) {
                                                    foreach($get_referral as $gr) {
                                                        if ($gr['affiliate_status'] == 'approved') {
                                                            if ($gr['affiliate_commission_type'] == 'flat') {
                                                                echo rupiah($gr['affiliate_commission']);
                                                            } elseif ($gr['affiliate_commission_type'] == 'persent') {
                                                                echo $gr['affiliate_commission'].'%';
                                                            }
                                                        } else {
                                                            echo "<span class='badge bg-warning text-dark'>Menunggu Persetujuan</span>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<span class='badge bg-danger'>Belum memiliki Akses</span>";
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6" style="text-align: left">
                                                Kode Referral
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                <?php
                                                $get_referral = mysqli_query($connect_w2p, "SELECT * FROM nsm_affiliate WHERE customer_id=".Auth()->user()->id_customer." LIMIT 1");
                                                if ($get_referral->num_rows > 0) {
                                                    foreach($get_referral as $gr) {
                                                        if ($gr['affiliate_status'] == 'pending') {
                                                            echo "<span class='badge bg-warning text-dark'>Permintaan Tertunda</span>";
                                                        } elseif ($gr['affiliate_status'] == 'review') {
                                                            echo "<span class='badge bg-primary'>Review Akun</span>";
                                                        } elseif ($gr['affiliate_status'] == 'rejected') {
                                                            echo "<span class='badge bg-danger'>Permintaan Ditolak</span>";
                                                        } elseif ($gr['affiliate_status'] == 'approved') {
                                                            echo $gr['affiliate_code'];
                                                        }
                                                    }
                                                } else {
                                                    echo "<span class='badge bg-danger'>Belum memiliki Akses</span>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mb-2" style="text-align: left">
                                                Lihat penjelasan saldo afiliasi <a href="javascript:0;">disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card" style="height: 36%">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8" style="text-align: left; margin-top: 2%">
                                                <h6>Biaya Layanan Transaksi</h6>
                                                <p>Transaksi periode laporan yang ingin diunduh (Maksimum 90 hari)</p>
                                            </div>
                                            <div class="col-md-4" style="text-align: right; margin-top: 2%">
                                                <button class="btn btn-success">Download Laporan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="height: 100%; margin-top: 2%">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4" style="text-align: left; margin-top: 3%">
                                                <h4>Riwayat Saldo</h4>
                                            </div>
                                            <div class="col-md-4" style="text-align: right; margin-top: 1%">
                                                <input type="date" placeholder="Datetime" name="report_datetime" />
                                            </div>
                                            <div class="col-md-4" style="text-align: right; margin-top: 2%">
                                                <button class="btn btn-success">Download Riwayat</button>
                                            </div>
                                            <div class="col-md-12">
                                                <hr style="margin-top: 2%">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 2%">
                                                @if (count($users) > 0)
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Estimasi</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Tanggal Pemakaian</th>
                                                        <th scope="col">Tanggal Pelunasan</th>
                                                        <th scope="col">Cek Order</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $report)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>
                                                            @if($report->order_id == null)
                                                                <span class="text-danger">Belum Digunakan</span>
                                                            @else
                                                                {{ $report->order_id }}
                                                            @endif
                                                        </td>
                                                        <td>{{ rupiah($report->ah_amount) }}</td>
                                                        <td>
                                                            @if($report->ah_status == 'pending')
                                                                <span class="badge bg-warning">Tertunda</span>
                                                            @elseif($report->ah_status == 'success')
                                                                <span class="badge bg-success">Berhasil</span>
                                                            @elseif($report->ah_status == 'waiting')
                                                                <span class="badge bg-info">Menunggu</span>
                                                            @elseif($report->ah_status == 'failed')
                                                                <span class="badge bg-danger">Kadaluarsa</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $report->ah_date }}</td>
                                                        <td>
                                                            @if($report->ah_success == 'null')
                                                                <span class="text-danger">Belum Terlunasi</span>
                                                            @else
                                                                {{ $report->ah_success }}
                                                            @endif
                                                        </td>
                                                        <td><a href="https://indoprinting.co.id/trackorder?invoice={{ $report->order_id }}" target="_blank">Klik disini</a></td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @else
                                                    <div class="row">
                                                        <div class="col-md-12" style="text-align: center">
                                                            <p>Belum ada Report</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection