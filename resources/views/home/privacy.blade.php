@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Kebijakan Privasi
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
                                        <h2>Kebijakan Privasi</h2>
                                        <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                            <span class="post-by">Dari <a href="#">Indoprinting</a></span>
                                            <span class="post-on has-dot">20 Februari 2020</span>
                                            <span class="hit-count has-dot">Telah Dilihat 1k Pengguna</span>
                                        </div>
                                    </div>
                                    <div class="single-content mb-50">
                                        {!! $privacy !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                                <div class="widget-area">
                                    <div class="sidebar-widget-2 widget_search mb-50">
                                        <div class="search-form">
                                            <form action="#">
                                                <input type="text" placeholder="Cari Produk…" />
                                                <button type="submit"><i class="fi-sr-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="sidebar-widget widget-category-2 mb-30">
                                        <h5 class="section-title style-1 mb-30">Kategori</h5>
                                        <ul>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-1.svg" alt="" />Milks & Dairies</a><span class="count">30</span>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-2.svg" alt="" />Clothing</a><span class="count">35</span>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-3.svg" alt="" />Pet Foods </a><span class="count">42</span>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-4.svg" alt="" />Baking material</a><span class="count">68</span>
                                            </li>
                                            <li>
                                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-5.svg" alt="" />Fresh Fruit</a><span class="count">87</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Product sidebar Widget -->
                                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                        <h5 class="section-title style-1 mb-30">Trending Now</h5>
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
                                            </div>
                                            <div class="content pt-10">
                                                <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                                                <p class="price mb-0 mt-5">$99.50</p>
                                                <div class="product-rate">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />
                                            </div>
                                            <div class="content pt-10">
                                                <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                                                <p class="price mb-0 mt-5">$89.50</p>
                                                <div class="product-rate">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />
                                            </div>
                                            <div class="content pt-10">
                                                <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                                                <p class="price mb-0 mt-5">$25</p>
                                                <div class="product-rate">
                                                    <div class="product-rating" style="width: 60%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="assets/imgs/shop/thumbnail-6.jpg" alt="#" />
                                            </div>
                                            <div class="content pt-10">
                                                <h6><a href="shop-product-detail.html">Lorem, ipsum</a></h6>
                                                <p class="price mb-0 mt-5">$25</p>
                                                <div class="product-rate">
                                                    <div class="product-rating" style="width: 60%"></div>
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
        </div>
    </main>
@endsection