@extends('layouts.main')
@section('main')
    @php
        $databaseHost = 'localhost';
        $databaseName = 'idp_w2p';
        $databaseUsername = 'idp_w2p';
        $databasePassword = 'Dur14n100$';
        $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    @endphp
<main class="main pages mb-80">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Home</a>
                > Daftar Creator
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Daftar Creator</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Cari Creator (dengan nama atau ID)..." />
                                    <button type="submit"><i class="fi-sr-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Kami memiliki <strong class="text-brand">2</strong> Creator</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-sr-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-sr-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-sr-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-sr-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a href="#">Mall</a></li>
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Preferred</a></li>
                                        <li><a href="#">Total items</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vendor-grid">
                @foreach($creator_list as $cl)
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <div class="vendor-wrap style-2 mb-40">
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot"><i class="fi-sr-check"></i></span>
                            </div>
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img">
                                    <a href="#">
                                        <img class="default-img" src="{{ asset('assets/images/creator/' . $cl->userphoto) }}" alt="" />
                                    </a>
                                </div>
                                <div class="mt-10">
                                        <?php
                                        $get_template = mysqli_query($connect_w2p, "SELECT * FROM nsm_products WHERE user_id='".$cl->id_user."' AND active=1");
                                        $total_template = mysqli_num_rows($get_template) ?>
                                    <span class="font-small total-product"><?= $total_template ?> template</span>
                                </div>
                            </div>
                            <div class="vendor-content-wrap">
                                <div class="mb-30">
                                    <div class="product-category">
                                        <span class="text-muted">Bergabung Sejak {{ date($cl->userjoin) }}</span>
                                    </div>
                                    <h4 class="mb-5"><a href="#">{{ $cl->username }}</a></h4>
                                    <div class="product-rate-cover">
                                        <span class="font-small text-muted"> (0 Suka)</span>
                                        <span class="font-small ml-20 text-muted"> (0 Review)</span>
                                    </div>
                                    <div class="vendor-info d-flex justify-content-between align-items-end mt-30">
                                        <ul class="contact-infor text-muted">
                                            <li><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Alamat: </strong> <span>Jl. Durian Raya No. 100, Banyumanik Semarang</span></li>
                                            <li><img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Hubungi:</strong><span>0821 3200 3200</span></li>
                                        </ul>
                                        <a href="{{ route('creator.detail') }}?username={{$cl->username}}" class="btn btn-xs">Kunjungi <i class="fi-sr-arrow-small-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection