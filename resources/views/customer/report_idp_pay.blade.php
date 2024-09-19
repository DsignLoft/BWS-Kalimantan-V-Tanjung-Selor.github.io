<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-content pt-50 pb-70">
            <div class="container">
                <div class="row">
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
                                                            <small>Total Saldo Aktif</small>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?php
                                                            $get_balance = mysqli_query($connect_w2p, "SELECT * FROM idp_customers WHERE id_customer=".Auth()->user()->id_customer." LIMIT 1");
                                                            if ($get_balance->num_rows > 0) {
                                                                foreach($get_balance as $gb) {
                                                                    echo "<h4>".rupiah($gb['balance'])."</h4>";
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
                                                Saldo Refund
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                Rp 0
                                            </div>
                                            <div class="col-md-6" style="text-align: left">
                                                Saldo Penghasilan
                                            </div>
                                            <div class="col-md-6" style="text-align: right">
                                                Rp 0
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: left">
                                                Lihat penjelasan saldo <a href="javascript:0;">disini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card" style="height: 44%">
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
                                <div class="card" style="height: 44%; margin-top: 2%">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4" style="text-align: left; margin-top: 2%">
                                                <h3>Riwayat Saldo</h3>
                                            </div>
                                            <div class="col-md-4" style="text-align: right; margin-top: 1%">
                                                <input type="date" placeholder="Datetime" name="report_datetime" />
                                            </div>
                                            <div class="col-md-4" style="text-align: right; margin-top: 2%">
                                                <button class="btn btn-success">Download Riwayat</button>
                                            </div>
                                            <div class="col-md-12">
                                                <table></table>
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
@endsection
