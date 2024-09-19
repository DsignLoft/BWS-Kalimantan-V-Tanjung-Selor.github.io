<?php
$url =$_SERVER['REQUEST_URI'];
$result = parse_url($url, PHP_URL_QUERY);
?>
@if($result != null)
    <div class="cart">
        <a href="..." class="text-secondary fad fa-trash-alt" style="font-size:20px" onclick="javascript:return confirm('Delete this item ?')"></a>
        <div style="display: flex;">
            <div class="thumbnail">
                <img id="screenshot" alt="">
            </div>
            <div class="cart-content">
                <div class="title" id="name"></div>
                <div class="atb">Kuantitas : ...</div>
                <div class="atb">...</div>
                <div class="atb">Note : ... <a href="javascript:;" class="update-note text-danger" data-note="..."><i class="far fa-edit"></i> Ubah</a></div>
                <form class="form-note" id="note..." action="..." method="POST">
                    @csrf
                    <input type="hidden" name="id" value="...">
                    <x-summernote class="form-control textarea" name="note" rows="2">...</x-summernote>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">save</button>
                    </div>
                </form>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#desainModal...">Lihat desain</a>
                <!-- </div> -->
                <div class="price mb-2">Harga <span class="float-right">..</span></div>
            </div>
        </div>
        <div class="footer"></div>
        <!-- modal desain -->
        <div class="modal fade" id="desainModal" tabindex="-1" role="dialog" aria-labelledby="desainModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-100" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="desainModalTitle"><b>Desain produkku</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="far fa-times-square"></i>
                        </button>
                    </div>
                    <div class="modal-body detail-desain">
                        <p>Design </p>
                        <img src="" alt="" class="img-desain d-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    @php
        $i=1
    @endphp
    @foreach ($carts as $cart)
        <tr class="pt-30">
            <td class="custome-checkbox pl-30"><?= $i++ ?></td>
            <td class="image product-thumbnail pt-40"><img src="{{ adminUrl('assets/images/products-img/' . $cart->thumbnail) }}" alt="#"></td>
            <td class="product-des product-name">
                <h6 class="mb-5">{{ $cart->name }}</h6>
                <div class="product-rate-cover">
                <span class="font-small ml-5 text-muted">
                    Kuantitas : {{ $cart->qty }}
                    <br />
                    Discount: {{ rupiah($cart->discount) }}
                </span>
                </div>
            </td>
            <td class="price" data-title="Price">
                <h4 class="text-body">
                    @php
                        $sum = 0;
                        $sum = $cart->price - $cart->discount
                    @endphp
                    {{ rupiah($sum) }}
                </h4>
            </td>
            <td class="text-center detail-info" data-title="Stock"> </td>
            <td class="price" data-title="Price"></td>
        </tr>
    @endforeach
@endif
