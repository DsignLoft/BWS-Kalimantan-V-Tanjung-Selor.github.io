<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <div class="container mt-2" style="margin-bottom: 2%">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h4 class="mb-15">Member Bronze <a href="{{ route('membership') }}"><i class="fi-sr-arrow-right mr-5"></i></a></h4>
                    <div class="breadcrumb">
                        Lakukan Transaksi 20x lagi
                    </div>
                    <ul>
                        <li class="hover-up">
                            <h6 style="text-align: right">Silver</h6>
                            <hr>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-9 text-end d-none d-xl-block">
                    <ul class="tags-list">
                        <li class="hover-up">
                            <a href="javascript:0;;">
                                <p style="text-align: left">
                                    <strong>
                                        <img src="https://assets.tokopedia.net/asts/rewardspage/widget/TokoMember.svg" alt="Reseller Member" />
                                        Reseller Member
                                    </strong>
                                <hr>
                                Belum Bergabung
                                </p>
                            </a>
                        </li>
                        <li class="hover-up active">
                            <a href="javascript:0;;">
                                <p style="text-align: left">
                                    <strong>
                                        <img src="https://assets.tokopedia.net/asts/rewardspage/bbo/Widget@2x.svg" alt="Bebas Ongkir" />
                                        Bebas Ongkir
                                    </strong>
                                <hr>
                                0 Kuota Lagi
                                </p>
                            </a>
                        </li>
                        <li class="hover-up">
                            <a href="javascript:0;;">
                                <p style="text-align: left">
                                    <strong>
                                        <img src="https://assets.tokopedia.net/asts/rewardspage/widget/TopQuest.svg" alt="Misi Baru" />
                                        Misi Seru
                                    </strong>
                                <hr>
                                0 Tantangan
                                </p>
                            </a>
                        </li>
                        <li class="hover-up">
                            <a href="javascript:0;;">
                                <p style="text-align: left">
                                    <strong>
                                        <img src="https://assets.tokopedia.net/asts/rewardspage/widget/MyCoupons.svg" alt="Kupon Saya" />
                                        Kupon Saya
                                    </strong>
                                <hr>
                                2 Kupon
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-12 mt-2">
                    <p>Ayo jadi Member Silver dengan cara selesaikan progres di atas sebelum 31 Okt 2023!</p>
                </div>
            </div>
        </div>
        <div class="card mt-2" style="width: 100%;">
            <div class="card-body">
                <a href="#">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Kamu hemat: Rp0</strong> Pakai promo & kuota Bebas Ongkir, yuk!</p>
                        </div>
                        <div class="col-md-6" style="text-align: right"><h5>&#8594</h5></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Kupon Khusus Member Bronze</h4>
                <p>Klaim kupon khusus buat kamu</p>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/blog/promo/2022/11/1200x200-2.jpg?ect=4g" width="100%" alt="" />
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Promo Produk Pilihan</h4>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/WVCyGU/2023/3/13/c89b6688-9ae2-4c7a-aa1c-979fc4880979.jpg" width="100%" alt="" />
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Kupon Khusus Member Bronze</h4>
                <p>Klaim kupon khusus buat kamu</p>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/blog/promo/2022/11/1200x200-2.jpg?ect=4g" width="100%" alt="" />
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Yuk jadi member reseller favoritmu</h4>
                <p>Gak akan pernah kehabisan kupon eksklusif member</p>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/blog/promo/2022/08/My-Rewards-PC-1200x200-3.jpg?ect=4g" width="100%" alt="" />
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Serbu Official Reseller</h4>
                <p>Cek Promo Menarik Setiap Harinya dari Serbu Official Reseller</p>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/blog/promo/2022/11/SOS-NOV-G1_Reward-Page-1200x200_-1.jpg?ect=4g" width="100%" alt="" />
            </div>
        </div>
        <div class="row" style="margin-top: 3%">
            <div class="col-md-12">
                <h4 style="font-family: 'Arial Black'; color: #424141">Promo Hari Ini</h4>
                <p>Cek Promo Hari Ini Pasti Pas Untukmu</p>
            </div>
            <div class="col-md-12" style="margin-top: 2%">
                <img src="https://images.tokopedia.net/img/blog/promo/2022/12/PHI-MY-REWARDS-DESKTOP.jpg?ect=4g" width="100%" alt="" />
            </div>
        </div>
    </div>
@endsection
