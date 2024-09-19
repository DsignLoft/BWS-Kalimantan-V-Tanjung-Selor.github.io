<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header-limited" style="background: url({{ adminUrl('assets/images/banner/'. $banner) }}) no-repeat center center; border-radius: 20px; padding: 70px 80px; background-size: cover;">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15"></h1>
                            <div class="breadcrumb">
                                <br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="row product-grid">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    @php
                                        $tz = 'Asia/Jakarta';
                                        $dt = new DateTime("now", new DateTimeZone($tz));
                                        $timestamp = $dt->format('Y-m-d G:i:s');
                                    @endphp
                                    @foreach ($products as $product)
                                        @if ($product->discount == 1)
                                            @if ($product->discount_time > $timestamp)
                                                <div class="col-xl-3 col-lg-4 col-md-6">
                                                    <div class="product-cart-wrap style-2">
                                                        <div class="product-img-action-wrap">
                                                            <div class="product-img">
                                                                <a href="{{ route('product', $product->id_product) }}">
                                                                    <img src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="{{ $product->name }} INDOPRINTING" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-content-wrap">
                                                            <div class="deals-countdown-wrap">
                                                                <div class="deals-countdown" data-countdown="{{ $product->discount_time }}"></div>
                                                            </div>
                                                            <div class="deals-content">
                                                                <h2><a href="{{ route('product', $product->id_product) }}">{{ substr($product->name, 0, 20) }}..</a></h2>
                                                                <div>
                                        <span class="font-small text-muted">
                                            {{ round($product->review_avg_rating, 1) ?? 0 }} <i class="fi fi-sr-star text-warning"></i> | Terjual
                                            {{ soldThousand($product->best_seller_sum_qty ?? 0) }}
                                        </span>
                                                                </div>
                                                                <div class="product-card-bottom">
                                                                    <div class="product-price">
                                                                        <span>{{ rupiah($product->min_price - $product->discount_price) }}</span>
                                                                        <br />
                                                                        <span class="old-price">{{ rupiah($product->min_price) }}</span>
                                                                    </div>
                                                                    <div class="add-cart">
                                                                        <a class="add" href="{{ route('product', $product->id_product) }}"><i class="fi-sr-shopping-cart mr-5"></i>Pilih </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <!--End product-grid-4-->
                            </div>
                        </div>
                    </div>
                    <!--product grid-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
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
                </div>
            </div>
        </div>
    </main>
@endsection
