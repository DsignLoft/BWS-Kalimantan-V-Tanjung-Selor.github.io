<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <div class="container mt-2" style="margin-bottom: 2%">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <h1 class="mb-15">Member Bronze</h1>
                </div>
                <div class="col-xl-7 text-end d-none d-xl-block">
                    <ul>

                        <li class="hover-up">
                            <p style="text-align: left">
                                <strong>
                                    Transaksi 20x lagi
                                </strong>
                            <hr>
                            <h5>Silver</h5>
                            </p>
                        </li>
                    </ul>
                    <ul>
                        <li class="hover-up active">
                            <p style="text-align: left">
                                <strong>
                                    Transaksi Rp 1.400.000 lagi
                                </strong>
                            <hr>
                            <h5>Silver</h5>
                            </p>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Keuntungan Member</h4>
            </div>
            <div class="col-md-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-body">
                        <img src="https://images.tokopedia.net/img/tokopedia/rewards/bebas-ongkir2x.png" alt="" />
                        <h5 class="card-title">Bebas Ongkir 2x per minggu</h5>
                        <p class="card-text">Pakai 2 dari 2 kuota Bebas Ongkir biar makin hemat belanja. Kuota diperbarui setiap pukul 00:00 WIB di awal minggu.</p>
                        <a href="javascript:0;;" class="btn btn-success mt-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 2%">
                <div class="card">
                    <div class="card-body">
                        <img src="https://images.tokopedia.net/img/rewards/benefits/level-up-silver-2x.png" alt="" />
                        <h5 class="card-title">Lebih cepat naik level</h5>
                        <p class="card-text">Level membership kamu bisa naik 2x lebih cepat ke Silver. Rutin cek progres, ya!</p>
                        <a href="javascript:0;;" class="btn btn-success mt-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
