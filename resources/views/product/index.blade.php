<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); ?>
@extends('layouts.main')
@section('main')
    <main class="main">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header-product">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">@if(isset($_GET['keyword'])) <?= $_GET['keyword'] ?> @else Produk @endif</h1>
                            <div class="breadcrumb">
                                <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                                > @if(isset($_GET['keyword'])) <?= $_GET['keyword'] ?> @else Produk @endif
                            </div>
                        </div>

                        <?php if (isset($_GET['keyword'])) { ?>
                            <?php
                            $keyword_value = $_GET['keyword'];
                            $inset_keyword = mysqli_query($connect_w2p, "INSERT INTO `nsm_suggestion`(`suggestion_keyword`) VALUES ('$keyword_value')");
                            ?>
                        <?php } ?>

                        <?php $url= $_SERVER['REQUEST_URI']; $aPath = explode('/', $url); if (isset($aPath[2])) { ?>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                                <li class="hover-up active">
                                    <a href="{{ route('category', $aPath[2]) }}"><i class="fi-sr-search mr-10"></i>Produk</a>
                                </li>
                                    <?php $get_template = mysqli_query($connect_w2p, 'SELECT * FROM nsm_categories WHERE category_id = "'.$aPath[2].'" LIMIT 1');
                                foreach ($get_template as $category) { ?>
                                <li class="hover-up">
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
{{--                    <div class="shop-product-fillter">--}}
{{--                        <div class="totall-product">--}}
{{--                            <p></p>--}}
{{--                        </div>--}}
{{--                        <div class="sort-by-product-area">--}}
{{--                            <div class="sort-by-cover mr-10"></div>--}}
{{--                            <div class="sort-by-cover">--}}
{{--                                <form method="GET" id="myForm">--}}
{{--                                    @csrf--}}
{{--                                    <select class="form-control" name="sort" id="sort" style="float: right;width:175px">--}}
{{--                                        <option value="name,asc">Urutkan : A - Z</option>--}}
{{--                                        <option value="name,desc">Urutkan : Z - A</option>--}}
{{--                                        <option value="min_price,asc">Urutkan : Termurah</option>--}}
{{--                                        <option value="min_price,desc">Urutkan : Termahal</option>--}}
{{--                                        <option value="best_seller_sum_qty,desc">Urutkan : Terlaris</option>--}}
{{--                                    </select>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row product-grid">
                        @if ($products != [])
                            <x-product-view :products="$products" />
                        @endif
                        @if ($products->count() == 0)
                            <div style="text-align: center;font: 24px bold">Produk tidak ditemukan</div>
                        @endif
                    </div>
                    <!--product grid-->
                    {{ $products->links() }}

                    {{--PR Penawaran Hari Ini--}}
{{--                    <section class="section-padding pb-5">--}}
{{--                        <div class="section-title">--}}
{{--                            <h3 class="">Penawaran Hari Ini</h3>--}}
{{--                            <a class="show-all" href="#">--}}
{{--                                Semua Penawaran--}}
{{--                                <i class="fi-sr-angle-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6">--}}
{{--                                <div class="product-cart-wrap style-2">--}}
{{--                                    <div class="product-img-action-wrap">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <a href="shop-product-right.html">--}}
{{--                                                <img src="assets/imgs/banner/banner-5.png" alt="" />--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content-wrap">--}}
{{--                                        <div class="deals-countdown-wrap">--}}
{{--                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-content">--}}
{{--                                            <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown</a></h2>--}}
{{--                                            <div class="product-rate-cover">--}}
{{--                                                <div class="product-rate d-inline-block">--}}
{{--                                                    <div class="product-rating" style="width: 90%"></div>--}}
{{--                                                </div>--}}
{{--                                                <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card-bottom">--}}
{{--                                                <div class="product-price">--}}
{{--                                                    <span>$32.85</span>--}}
{{--                                                    <span class="old-price">$33.8</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="add-cart">--}}
{{--                                                    <a class="add" href="shop-cart.html"><i class="fi-sr-shopping-cart mr-5"></i>Add </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6">--}}
{{--                                <div class="product-cart-wrap style-2">--}}
{{--                                    <div class="product-img-action-wrap">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <a href="shop-product-right.html">--}}
{{--                                                <img src="assets/imgs/banner/banner-6.png" alt="" />--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content-wrap">--}}
{{--                                        <div class="deals-countdown-wrap">--}}
{{--                                            <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-content">--}}
{{--                                            <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten</a></h2>--}}
{{--                                            <div class="product-rate-cover">--}}
{{--                                                <div class="product-rate d-inline-block">--}}
{{--                                                    <div class="product-rating" style="width: 90%"></div>--}}
{{--                                                </div>--}}
{{--                                                <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card-bottom">--}}
{{--                                                <div class="product-price">--}}
{{--                                                    <span>$24.85</span>--}}
{{--                                                    <span class="old-price">$26.8</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="add-cart">--}}
{{--                                                    <a class="add" href="shop-cart.html"><i class="fi-sr-shopping-cart mr-5"></i>Add </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">--}}
{{--                                <div class="product-cart-wrap style-2">--}}
{{--                                    <div class="product-img-action-wrap">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <a href="shop-product-right.html">--}}
{{--                                                <img src="assets/imgs/banner/banner-7.png" alt="" />--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content-wrap">--}}
{{--                                        <div class="deals-countdown-wrap">--}}
{{--                                            <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-content">--}}
{{--                                            <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom</a></h2>--}}
{{--                                            <div class="product-rate-cover">--}}
{{--                                                <div class="product-rate d-inline-block">--}}
{{--                                                    <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                </div>--}}
{{--                                                <span class="font-small ml-5 text-muted"> (3.0)</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card-bottom">--}}
{{--                                                <div class="product-price">--}}
{{--                                                    <span>$12.85</span>--}}
{{--                                                    <span class="old-price">$13.8</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="add-cart">--}}
{{--                                                    <a class="add" href="shop-cart.html"><i class="fi-sr-shopping-cart mr-5"></i>Add </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">--}}
{{--                                <div class="product-cart-wrap style-2">--}}
{{--                                    <div class="product-img-action-wrap">--}}
{{--                                        <div class="product-img">--}}
{{--                                            <a href="shop-product-right.html">--}}
{{--                                                <img src="assets/imgs/banner/banner-8.png" alt="" />--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content-wrap">--}}
{{--                                        <div class="deals-countdown-wrap">--}}
{{--                                            <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="deals-content">--}}
{{--                                            <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>--}}
{{--                                            <div class="product-rate-cover">--}}
{{--                                                <div class="product-rate d-inline-block">--}}
{{--                                                    <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                </div>--}}
{{--                                                <span class="font-small ml-5 text-muted"> (3.0)</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card-bottom">--}}
{{--                                                <div class="product-price">--}}
{{--                                                    <span>$15.85</span>--}}
{{--                                                    <span class="old-price">$16.8</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="add-cart">--}}
{{--                                                    <a class="add" href="shop-cart.html"><i class="fi-sr-shopping-cart mr-5"></i>Add </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}
                    <!--End Deals-->

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
                    {{--PR Filter Produk--}}
                    <!-- Fillter By Price -->
{{--                    <div class="sidebar-widget price_range range mb-30">--}}
{{--                        <h5 class="section-title style-1 mb-30">Fill by price</h5>--}}
{{--                        <div class="price-filter">--}}
{{--                            <div class="price-filter-inner">--}}
{{--                                <div id="slider-range" class="mb-20"></div>--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>--}}
{{--                                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="list-group">--}}
{{--                            <div class="list-group-item mb-10 mt-10">--}}
{{--                                <label class="fw-900">Color</label>--}}
{{--                                <div class="custome-checkbox">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>--}}
{{--                                    <br />--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>--}}
{{--                                    <br />--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>--}}
{{--                                </div>--}}
{{--                                <label class="fw-900 mt-15">Item Condition</label>--}}
{{--                                <div class="custome-checkbox">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>--}}
{{--                                    <br />--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>--}}
{{--                                    <br />--}}
{{--                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />--}}
{{--                                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="btn btn-sm btn-default"><i class="fi-sr-filter mr-5"></i> Fillter</a>--}}
{{--                    </div>--}}
                    <!-- Product sidebar Widget -->
                </div>
            </div>
        </div>
    </main>


    {{--Example ext code--}}
{{--    <main>--}}
{{--        <section id="breadcrumbs" class="breadcrumbs">--}}
{{--            <div class="container-fluid">--}}
{{--                <ol>--}}
{{--                    <li><a href="/">Beranda</a></li>--}}
{{--                    <li>Produk</li>--}}
{{--                </ol>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <h2>--}}
{{--                            Produk--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <form method="GET" id="myForm">--}}
{{--                            @csrf--}}
{{--                            <select class="form-control" name="sort" id="sort" style="float: right;width:175px">--}}
{{--                                <option value="name,asc">Urutkan : A - Z</option>--}}
{{--                                <option value="name,desc">Urutkan : Z - A</option>--}}
{{--                                <option value="min_price,asc">Termurah</option>--}}
{{--                                <option value="min_price,desc">Termahal</option>--}}
{{--                                <option value="best_seller_sum_qty,desc">Terlaris</option>--}}
{{--                            </select>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <section id="category" class="category">--}}
{{--            <div class="container-fluid">--}}
{{--                <x-alert />--}}
{{--                @if ($products != [])--}}
{{--                    <div class="product-list">--}}
{{--                        <x-product-view :products="$products" />--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    {{ $products->links() }}--}}
{{--                @endif--}}
{{--                @if ($products->count() == 0)--}}
{{--                    <div style="text-align: center;font: 24px bold">Produk tidak ditemukan</div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </main>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            let sort = "<?= $sort ?>";--}}
{{--            $("#sort").on('change', function() {--}}
{{--                $('#myForm').submit();--}}
{{--            });--}}

{{--            $("#sort").val(sort).find(`option[value="${sort}"]`).attr('selected', true);--}}
{{--        });--}}
{{--    </script>--}}
@endsection
