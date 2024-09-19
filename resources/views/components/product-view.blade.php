@props(['products'])
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
        <div class="row product-grid-4">
            @php
                $tz = 'Asia/Jakarta';
                $dt = new DateTime("now", new DateTimeZone($tz));
                $timestamp = $dt->format('Y-m-d G:i:s');
            @endphp
            @foreach ($products as $product)
                @if ($product->discount == 0)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product', $product->id_product) }}">
                                        <img class="default-img" src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="{{ $product->name }} INDOPRINTING" />
                                        <img class="hover-img" src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="{{ $product->name }} INDOPRINTING" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Dilihat {{ $product->views }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2 style="font-size: 10px;"><a href="{{ route('product', $product->id_product) }}">{{ $product->name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                                <div>
                                <span class="font-small text-muted">
                                    {{ round($product->review_avg_rating, 1) ?? 0 }} <i class="fi fi-sr-star text-warning"></i> | Terjual
                                    {{ soldThousand($product->best_seller_sum_qty ?? 0) }}
                                </span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span><small style="font-size: 10px;">mulai dari</small><br /> {{ rupiah($product->min_price) }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="{{ route('product', $product->id_product) }}"><i class="fi-sr-shopping-cart mr-5"></i>Pilih </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($product->discount == 1 && $product->discount_time < $timestamp)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product', $product->id_product) }}">
                                        <img class="default-img" src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="{{ $product->name }} INDOPRINTING" />
                                        <img class="hover-img" src="{{ adminUrl('assets/images/products-img/' . $product->thumbnail) }}" alt="{{ $product->name }} INDOPRINTING" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Dilihat {{ $product->views }}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('product', $product->id_product) }}">{{ $product->name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                </div>
                                <div>
                                <span class="font-small text-muted">
                                    {{ round($product->review_avg_rating, 1) ?? 0 }} <i class="fi fi-sr-star text-warning"></i> | Terjual
                                    {{ soldThousand($product->best_seller_sum_qty ?? 0) }}
                                </span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span><small style="font-size: 10px;">mulai dari</small><br /> {{ rupiah($product->min_price) }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="{{ route('product', $product->id_product) }}"><i class="fi-sr-shopping-cart mr-5"></i>Pilih </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!--End product-grid-4-->
    </div>
</div>
