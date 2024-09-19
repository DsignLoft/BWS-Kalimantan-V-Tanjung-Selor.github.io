<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header-design">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">@if(isset($_GET['keyword'])) <?= $_GET['keyword'] ?> @else Template @endif</h1>
                            <div class="breadcrumb">
                                <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                                > @if(isset($_GET['keyword'])) <?= $_GET['keyword'] ?> @else Template @endif
                            </div>
                        </div>

                        <?php $url= $_SERVER['REQUEST_URI']; $aPath = explode('/', $url); if (isset($aPath[2])) { ?>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up">
                                    <a href="{{ route('category', $aPath[2]) }}"><i class="fi-sr-search mr-10"></i>Produk</a>
                                </li>
                                    <?php $get_template = mysqli_query($connect_w2p, 'SELECT * FROM nsm_categories WHERE category_id = "'.$aPath[2].'" LIMIT 1');
                                foreach ($get_template as $category) { ?>
                                <li class="hover-up active">
                                    <a href="{{ route('template.category', $aPath[2]) }}"><i class="fi-sr-search mr-10"></i>Template</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="row product-grid">
                        @if ($design != [])
                            <x-template-view :design="$design" />
                        @endif
                        @if ($design->count() == 0)
                            <div style="text-align: center;font: 24px bold">Template tidak ditemukan</div>
                        @endif
                    </div>
                    <!--product grid-->
                    {{ $design->links() }}
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Kategori</h5>
                        <ul>
                            <?php
                            $categories = mysqli_query($connect_w2p, "SELECT * FROM nsm_categories WHERE parent=0 AND type='products' ORDER BY id desc");
                            foreach ($categories as $category) {
                                $thumbnail_url = 'https://indoprinting.co.id/assets/images/logo/favicon.png';
                                if(!empty($do->thumbnail_url))
                                    $thumbnail_url = $do->thumbnail_url;
                                ?>
                            <li>
                                <a href="{{ route('template.category', $category['category_id']) }}">
                                    <img src="<?= $thumbnail_url ?>" alt="" />
                                        <?= $category['name'] ?>
                                </a>
                                    <?php
                                    $total_template = mysqli_query($connect_w2p, "SELECT category_id, COUNT(category_id) AS total FROM nsm_products WHERE active = 1 AND category_id = '".$category['category_id']."'");
                                    $total   = mysqli_fetch_array($total_template); { ?>
                                <span class="count"><?= $total['total'] ?></span>
                                <?php } ?>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
