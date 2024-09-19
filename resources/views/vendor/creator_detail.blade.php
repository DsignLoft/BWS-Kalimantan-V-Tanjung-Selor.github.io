@extends('layouts.main')
@section('main')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Creator > Detail
                </div>
            </div>
        </div>
        <?php if (isset($_GET['username'])) { ?>
            <?php
            $databaseHost = 'localhost';
            $databaseName = 'idp_w2p';
            $databaseUsername = 'idp_w2p';
            $databasePassword = 'Dur14n100$';
            $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

            $get_user = mysqli_query($connect_w2p, "SELECT * FROM nsm_users WHERE username='".$_GET['username']."'");
            foreach ($get_user as $gu) {
                $author_template = $gu['id_user'];
                $author_username = $gu['username'];
                $author_join     = $gu['userjoin'];
                $author_profile  = $gu['userphoto'];
            }
            $user_result = mysqli_num_rows($get_user);
        if ($user_result > 0) {
            ?>
        <div class="container mb-30">
            <div class="archive-header-2 text-center pt-80 pb-50">
                <h1 class="display-2 mb-50"><?= $_GET['username'] ?></h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Cari template..." />
                                    <button type="submit"><i class="fi-sr-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                                <?php
                                $get_template = mysqli_query($connect_w2p, "SELECT * FROM nsm_products WHERE user_id='".$author_template."' AND active=1");
                                $total_template = mysqli_num_rows($get_template) ?>
                            <p>Kami menemukan <strong class="text-brand"><?= $total_template ?></strong> template untukmu!</p>
                        </div>
{{--                        <div class="sort-by-product-area">--}}
{{--                            <div class="sort-by-cover mr-10">--}}
{{--                                <div class="sort-by-product-wrap">--}}
{{--                                    <div class="sort-by">--}}
{{--                                        <span><i class="fi-sr-apps"></i>Show:</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="sort-by-dropdown-wrap">--}}
{{--                                        <span> 50 <i class="fi-sr-angle-small-down"></i></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="sort-by-dropdown">--}}
{{--                                    <ul>--}}
{{--                                        <li><a class="active" href="#">50</a></li>--}}
{{--                                        <li><a href="#">100</a></li>--}}
{{--                                        <li><a href="#">150</a></li>--}}
{{--                                        <li><a href="#">200</a></li>--}}
{{--                                        <li><a href="#">All</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="sort-by-cover">--}}
{{--                                <div class="sort-by-product-wrap">--}}
{{--                                    <div class="sort-by">--}}
{{--                                        <span><i class="fi-sr-apps-sort"></i>Sort by:</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="sort-by-dropdown-wrap">--}}
{{--                                        <span> Featured <i class="fi-sr-angle-small-down"></i></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="sort-by-dropdown">--}}
{{--                                    <ul>--}}
{{--                                        <li><a class="active" href="#">Featured</a></li>--}}
{{--                                        <li><a href="#">Price: Low to High</a></li>--}}
{{--                                        <li><a href="#">Price: High to Low</a></li>--}}
{{--                                        <li><a href="#">Release Date</a></li>--}}
{{--                                        <li><a href="#">Avg. Rating</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="row product-grid">
                            <?php
                            $get_tempalte = mysqli_query($connect_w2p, "SELECT * FROM nsm_products WHERE user_id='".$author_template."' AND active=1 ORDER BY id DESC");
                        foreach ($get_tempalte as $gt) {
                            $thumbnail_url = 'https://indoprinting.co.id/assets/images/logo/favicon.png';
                            if(!empty($gt['thumbnail_url']))
                                $thumbnail_url = $gt['thumbnail_url'];
                            ?>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('template.detail', $gt['id']) }}">
                                            <img class="default-img" src="<?= $thumbnail_url ?>" alt="<?= $gt['name'] ?>" />
                                            <img class="hover-img" src="<?= $thumbnail_url ?>" alt="<?= $gt['name'] ?>" />
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hemat 30%</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ route('template.detail', $gt['id']) }}"><?= $gt['name'] ?></a></h2>
                                    <div>
                                        <span class="font-small text-muted">dibuat oleh <a href="#"><?= $author_username ?></a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span><?php if($gt['price'] == 0) echo 'GRATIS'?></span>
                                        </div>
                                        <div class="add-cart">
                                            <a class="add" href="{{ route('template.detail', $gt['id']) }}"><i class="fi-sr-pencil mr-5"></i>Pilih </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <!--product grid-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                        <div class="vendor-logo mb-30">
                            <img src="{{ asset('assets/images/creator/' . $author_profile) }}" alt="<?= $author_username ?>" />
                        </div>
                        <div class="vendor-info">
                            <div class="product-category">
                                <span class="text-muted">Bergabung sejak <?= $author_join ?></span>
                            </div>
                            <h4 class="mb-5"><a href="#" class="text-heading"><?= $author_username ?></a></h4>
                            <div class="product-rate-cover mb-15">
                                <span class="font-small text-muted"> (5 Suka)</span>
                                <span class="font-small ml-5 text-muted"> (0 Review)</span>
                            </div>
                            <div class="vendor-des mb-30">
                                <p class="font-sm text-heading">Designer From Semarang City</p>
                            </div>
                            <div class="follow-social mb-20">
                                <h6 class="mb-15">Ikuti Saya</h6>
                                <ul class="social-network">
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/social-tw.svg" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/social-fb.svg" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/social-insta.svg" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/social-pin.svg" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vendor-info">
                                <ul class="font-sm mb-20">
                                    <li><img class="mr-5" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Alamat: </strong> <span>Jl. Durian Raya No. 100, Banyumanik Semarang</span></li>
                                    <li><img class="mr-5" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Hubungi:</strong><span>0821 3200 3200</span></li>
                                </ul>
                                <a href="#" class="btn btn-xs">Request Template <i class="fi-sr-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Category</h5>
                        <ul>
                                <?php
                                $categories = mysqli_query($connect_w2p, "SELECT * FROM nsm_categories WHERE parent=0 AND type='products' ORDER BY id desc");
                            foreach ($categories as $category) {
                                $thumbnail_url = 'https://indoprinting.co.id/assets/images/logo/favicon.png';
                                if(!empty($do->thumbnail_url))
                                    $thumbnail_url = $do->thumbnail_url;
                                ?>
                            <li>
                                <a href="{{ route('template.category', $category['category_id']) }}"> <img src="<?= $thumbnail_url ?>" alt="<?= $category['name'] ?>" /><?= $category['name'] ?></a>
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
        <?php } else { ?>
        <h1>Creator Tidak di temukan</h1>
        <?php } ?>

        <?php } else { ?>
        <h1>Creator Tidak di temukan</h1>
        <?php } ?>
    </main>
@endsection