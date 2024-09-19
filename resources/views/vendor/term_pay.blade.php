<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Syarat dan Ketentuan Penggunaan IDP Pay
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                    <div class="single-header style-2">
                                        <h2>Syarat Dan Ketentuan Penggunaan IDP Pay</h2>
                                        <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                            <span class="post-by">Dari <a href="https://indoprinting.co.id/">Indoprinting</a></span>
                                            <span class="post-on has-dot">20 Februari 2020</span>
                                            <span class="hit-count has-dot">Telah Dilihat 17k Pengguna</span>
                                        </div>
                                    </div>
                                    <div class="single-content mb-50">
                                        <h5><strong>1. Hanya bisa di dapatkan melalui program afiliasi dan menjadi creator indoprinting</strong></h5>
                                        <p>IDP Pay hanya bisa di dapatkan melalui program afiliasi atau menjadi creator indoprinting, selain daripada itu, maka saldo IDP Pay dianggap tidak sah dan Saldo dapat diblokir atau dinonaktifkan tanpa pemberitahuan terlebih dahulu.</p>

                                        <h5><strong>2. Saldo Tidak boleh dibagikan</strong></h5>
                                        <p>Saldo IDP Pay tidak boleh dibagikan dengan orang lain atau digunakan oleh orang lain selain dari pihak yang terdaftar sebagai anggota afiliasi atau creator indoprinting.</p>

                                        <h5><strong>3. Penanganan akun dengan aman</strong></h5>
                                        <p>Pemilik IDP Pay bertanggung jawab untuk menjaga keamanan akun, termasuk menjaga kerahasiaan password dan informasi akun lainnya. Indoprinting tidak bertanggung jawab atas kerugian yang timbul akibat kelalaian pemilik akun dalam menjaga keamanan akun.</p>

                                        <h5><strong>4. Penarikan Saldo IDP Pay</strong></h5>
                                        <p>Setiap tanggal 1 - 3 Saldo dapat ditarik bila nominal sudah mencapai saldo minimal penarikan.</p>

                                        <h5><strong>5. Saldo Minimal Penarikan</strong></h5>
                                        <p>Besaran saldo minimal penarikan senilai Rp 50.000,- . Bila saldo belum mencapai minimal penarikan, maka tidak dapat melakukan penarikan</p>

                                        <h5><strong>6. Biaya administrasi</strong></h5>
                                        <p>Tidak ada biaya administrasi dalam penarikan saldo.</p>

                                        <h5><strong>7. Dapat ditinjau kembali</strong></h5>
                                        <p>Syarat dan ketentuan ini dapat ditinjau kembali dan diubah oleh Indoprinting sewaktu-waktu tanpa pemberitahuan terlebih dahulu. Oleh karena itu, pemilik akun diharapkan untuk selalu melihat syarat dan ketentuan yang berlaku.</p>

                                        <h5><strong>8. Hukum yang berlaku</strong></h5>
                                        <p>Syarat dan ketentuan ini diatur oleh hukum yang berlaku di indoprinting dan setiap sengketa yang timbul akan diselesaikan sesuai dengan hukum yang berlaku di indonesia.</p>

                                        <h3 class="mt-6"><strong>Syarat Penggunaan</strong></h3>
                                        <p>Khusus dalam saldo IDP Pay yang di dapatkan dari program Afiliasi, Pihak internal Indoprinting DILARANG untuk menggunakannya, bila di ketahui, saldo IDP Pay akan di bekukan serta dapat di blokir</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                                <div class="widget-area">
                                    <div class="sidebar-widget-2 widget_search mb-50">
                                        <div class="search-form">
                                            <form action="{{ route('pencarian') }}" method="get">
                                                <input type="text" name="keyword" value="{{ $keyword ?? null }}" placeholder="Cari Produk…" />
                                                <button type="submit"><i class="fi-sr-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="sidebar-widget widget-category-2 mb-30">
                                        <h5 class="section-title style-1 mb-30">Kategori</h5>
                                        <ul>

                                            <?php
                                            $categories = mysqli_query($connect_w2p, "SELECT * FROM adm_product_categories");
                                            foreach ($categories as $category) { ?>
                                            <li>
                                                <a href="{{ route('category', $category['id_category']) }}">
                                                    <img src="{{ asset('assets/images/icons/' . $category['image']) }}" alt="" />
                                                        <?= $category['name'] ?>
                                                </a>
                                                    <?php
                                                    $total_product = mysqli_query($connect_w2p, "SELECT category, COUNT(category) AS total FROM idp_products WHERE active = 1 AND category = '".$category['id_category']."'");
                                                    $total   = mysqli_fetch_array($total_product); { ?>
                                                <span class="count"><?= $total['total'] ?></span>
                                                <?php } ?>
                                            </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                    <!-- Product sidebar Widget -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection