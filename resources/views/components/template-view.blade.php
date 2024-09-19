@props(['design'])
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
        <div class="row product-grid-4">
            @foreach ($design as $d)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('template.detail', $d->id) }}">
                                    <img class="default-img" src="{{ $d->thumbnail_url }}" alt="" />
                                    <img class="hover-img" src="{{ $d->thumbnail_url }}" alt="" />
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Dilihat {{ $d->views }} Pengguna</span>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('template.detail', $d->id) }}">{{ $d->name }}</a></h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                            </div>
                            <div>
                                <span class="font-small text-muted">
                                        <?php
                                        $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
                                        $get_author = mysqli_query($connect_w2p, "SELECT * FROM nsm_users WHERE id_user='".$d->user_id."'");
                                        foreach ($get_author as $ga) {
                                        ?>
                                    <a href="{{ route('creator.detail') }}?username=<?= $ga['username'] ?>">Creator: @<?= $ga['username'] ?></a>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span><?php if($d->price == 0) echo 'GRATIS'?></span>
                                </div>
                                <div class="add-cart">
                                    <a class="add" href="{{ route('template.detail', $d->id) }}"><i class="fi-sr-pencil mr-5"></i>Pilih </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!--End product-grid-4-->
    </div>
</div>
