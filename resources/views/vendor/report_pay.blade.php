<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-content pt-50 pb-370" style="margin-bottom: 20%">
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
                                                        <img src="https://images.tokopedia.net/img/deposit/saldo-green@2x.png" width="100%" alt="" style="margin-top: 40%;" />
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="col-md-12">
                                                            <p>Total Saldo Aktif</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h4>Rp 0</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-success" style="margin-top: 1%;">Tarik Saldo</button>
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
                                <div class="card" style="height: 21%">
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
                                                <hr style="margin-top: 2%">
                                            </div>
                                            <div class="col-md-12" style="margin-top: 2%">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td colspan="2">Larry the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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