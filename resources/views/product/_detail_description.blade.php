<div class="tab-style3">
    <ul class="nav nav-tabs text-uppercase">
        <li class="nav-item">
            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Keterangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Harga Terbaik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Sumber Design</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Ulasan ({{ $product->review_count }})</a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade show active" id="Description">
            <div class="">
                <?= $product['desc_id'] ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Additional-info">
            <div class="row">
                <div class="col-md-3" id="table-range"></div>
            </div>
            <div class="row">
                @php
                    $count = 2 + count($attributes->name);
                @endphp
                @for ($i = 2; $i < $count; $i++)
                    <div class="col-md-3" style="padding:5px 10px" id="range-atb{{ $i }}">
                        &nbsp;
                    </div>
                @endfor
            </div>
        </div>
        <div class="tab-pane fade" id="Vendor-info">
            <ul>
                <li>Jenis file: TIFF, JPG, PNG, PDF, ZIP, RAR.</li>
                <li>Ukuran File Upload maksimal 20 Mb, lebih dari 20 Mb menggunakan share link.</li>
                <li>Mohon dicek detail: design, text, ejaan, warna, background, informasi, batas margin.</li>
                <li>Mohon file yang anda kirim sudah Ready to print, file yang belum siap akan mempengaruhi waktu produksi.</li>
                <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 dan anda pilih ukuran 2x1 maka akan kita tarik di ukuran 2x1</li>
                <li>Setiap file yang dicetak sudah dicek terlebih dahulu sesuai keterangan yang di order</li>
                <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 di cetak menjadi 1x1 bukan 1x2</li>
                <li>Setiap file yang dicetak akan melalui pengecekan kembali untuk memastikan hasil yang maksimal</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="Reviews">
            <!--Comments-->
            @isset($product->review)
                <div class="comments-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="comment-list">
                                @foreach ($product->review as $review)
                                    <div class="single-comment justify-content-between d-flex mb-30">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb text-center">
                                                <img src="{{ asset('assets/images/logo/cust.png') }}" alt="" />
                                                @if($review->rating == null)
                                                @elseif($review->rating == 1)
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                @elseif($review->rating == 2)
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                @elseif($review->rating == 3)
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                @elseif($review->rating == 4)
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                @elseif($review->rating == 5)
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                    <i class="fi fi-sr-star text-warning"></i>
                                                @endif
                                                <br/>
                                                <a href="#" class="font-heading text-brand">{{ $review?->user?->name }}</a>
                                            </div>
                                            <div class="desc">
                                                <div class="d-flex justify-content-between mb-10">
                                                    <div class="d-flex align-items-center">
                                                        <span class="font-xs text-muted">{{ dateID($review->created_at) }} </span>
                                                    </div>
                                                </div>
                                                <p class="mb-10">
                                                    {!! $review->review !!}
                                                    <a href="#" class="reply">Reply</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @isset ($review->respon)
                                    <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb text-center">
                                                <img src="{{ asset('assets/images/logo/p.png') }}" alt="" />
                                                <a href="#" class="font-heading text-brand">Indoprinting</a>
                                            </div>
                                            <div class="desc">
                                                <div class="d-flex justify-content-between mb-10">
                                                    <div class="d-flex align-items-center">
                                                        <span class="font-xs text-muted">{{ dateID($review->created_at) }} </span>
                                                    </div>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                <p class="mb-10">
                                                    {!! $review->respon !!}
                                                    <a href="#" class="reply">Reply</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            <!--comment form-->
{{--            <div class="comment-form">--}}
{{--                <h4 class="mb-15">Add a review</h4>--}}
{{--                <div class="product-rate d-inline-block mb-30"></div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-8 col-md-12">--}}
{{--                        <form class="form-contact comment_form" action="#" id="commentForm">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <button type="submit" class="button button-contactForm">Submit Review</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>


{{--<div style="margin-top: 50px;">--}}
{{--    <div class="p-2">--}}
{{--        <ul class="nav nav-pills">--}}
{{--            <li><a class="nav-item nav-link active" href="#deskripsi" data-toggle="tab" id="rincian-produk">Rincian Produk</a></li>--}}
{{--            <li><a class="nav-item nav-link" href="#deskripsiHarga" data-toggle="tab">Harga</a></li>--}}
{{--            <li><a class="nav-item nav-link" href="#sumberUpload" data-toggle="tab">Sumber Upload</a></li>--}}
{{--            <li><a class="nav-item nav-link" href="#ulasan" data-toggle="tab" id="ulasan-tab">Ulasan</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="garis"></div>--}}
{{--    <div class="card-body" style="min-height: 700px;">--}}
{{--        <div class="tab-content">--}}

{{--            <div class="active tab-pane desc" id="deskripsi">--}}
{{--                <?= $product['desc_id'] ?>--}}
{{--            </div>--}}

{{--            <div class="tab-pane" id="deskripsiHarga">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-3" id="table-range"></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @php--}}
{{--                        $count = 2 + count($attributes->name);--}}
{{--                    @endphp--}}
{{--                    @for ($i = 2; $i < $count; $i++)--}}
{{--                        <div class="col-md-3" style="padding:5px 10px" id="range-atb{{ $i }}">--}}
{{--                            &nbsp;--}}
{{--                        </div>--}}
{{--                    @endfor--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class=" tab-pane" id="sumberUpload" style="font-size: 14px;">--}}
{{--                <ul>--}}
{{--                    <li>Jenis file: TIFF, JPG, PNG, PDF, ZIP, RAR.</li>--}}
{{--                    <li>Ukuran File Upload maksimal 20 Mb, lebih dari 20 Mb menggunakan share link.</li>--}}
{{--                    <li>Mohon dicek detail: design, text, ejaan, warna, background, informasi, batas margin.</li>--}}
{{--                    <li>Mohon file yang anda kirim sudah Ready to print, file yang belum siap akan mempengaruhi waktu produksi.</li>--}}
{{--                    <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 dan anda pilih ukuran 2x1 maka akan kita tarik di ukuran 2x1</li>--}}
{{--                    <li>Setiap file yang dicetak sudah dicek terlebih dahulu sesuai keterangan yang di order</li>--}}
{{--                    <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 di cetak menjadi 1x1 bukan 1x2</li>--}}
{{--                    <li>Setiap file yang dicetak akan melalui pengecekan kembali untuk memastikan hasil yang maksimal</li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="tab-pane" id="ulasan">--}}
{{--                @isset($product->review)--}}
{{--                    <div class="offer-dedicated-body-left">--}}
{{--                        <div class="tab-content" id="pills-tabContent">--}}
{{--                            <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">--}}
{{--                                <div class="bg-white rounded shadow-sm p-4 mb-4 detail-review">--}}
{{--                                    @foreach ($product->review as $review)--}}
{{--                                        <div class="reviews-members pt-4 pb-4">--}}
{{--                                            <div class="media">--}}
{{--                                                <a href="#"><img alt="" src="{{ asset('assets/images/logo/cust.png') }}" class="mr-3 rounded-pill"></a>--}}
{{--                                                <div class="media-body">--}}
{{--                                                    <div class="reviews-members-header">--}}
{{--                                                        <h6 class="mb-1 text-black">--}}
{{--                                                            {{ $review?->user?->name }}--}}
{{--                                                        </h6>--}}
{{--                                                        <div class="tgl-rate">--}}
{{--                                                            {{ dateID($review->created_at) }}--}}
{{--                                                        </div>--}}
{{--                                                        <div class="rating-product">--}}
{{--                                                            <div class="Stars2" style="--rating: {{ $review->rating }};"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="reviews-members-body text-justify mt-2">--}}
{{--                                                        <p>--}}
{{--                                                            {!! $review->review !!}--}}
{{--                                                        </p>--}}
{{--                                                    </div>--}}
{{--                                                    @if ($review->respon)--}}
{{--                                                        <div class="reviews-members pt-2 pb-4">--}}
{{--                                                            <div class="media">--}}
{{--                                                                <a href="#"><img alt="" src="{{ asset('assets/images/logo/p.png') }}" class="mr-3 rounded-pill"></a>--}}
{{--                                                                <div class="media-body">--}}
{{--                                                                    <div class="reviews-members-header">--}}
{{--                                                                        <h6 class="text-black">Indoprinting</h6>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="reviews-members-body text-justify mt-2  ">--}}
{{--                                                                        <p>--}}
{{--                                                                            {!! $review->respon !!}--}}
{{--                                                                        </p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endisset--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
