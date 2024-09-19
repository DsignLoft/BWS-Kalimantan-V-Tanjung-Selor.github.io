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
                    Kuantitas : {{ $cart->qty }}x print
                </span>
                <br />
                @foreach (json_decode($cart->attributes)->jenis_atb as $id => $atribut)
                    <span class="font-small ml-5 text-muted"> {{ $atribut }} : {{ json_decode($cart->attributes)->nama_atb[$id] }}</span>
                    <br />
                @endforeach
                <span class="font-small ml-5 text-muted">
                    Note : {!! $cart->product_note !!} <a href="javascript:;" class="update-note text-danger" data-note="{{ $cart->id }}"><i class="far fa-edit"></i> Ubah</a>
                </span>
                <form class="form-note" id="note{{ $cart->id }}" action="{{ route('update.note') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $cart->id }}">
                    <x-summernote class="form-control textarea" name="note" rows="2">{{ $cart->product_note }}</x-summernote>
                    <div class="text-center mt-2">
                        <button class="btn btn-primary" type="submit">save</button>
                    </div>
                </form>
                @if ($cart->design)
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#desainModal{{ $cart->id }}">Lihat desain</a>
                @elseif($cart->id_category == 17)
                    <div style="margin-top: 20px;"></div>
                @else
                    <div class="atb">Link Design : <a href="//{!! $cart->link !!}" target="_blank">{{ $cart->link }}</a></div>
                @endif
            </div>
        </td>
        <td class="price" data-title="Price">
            <h4 class="text-body">{{ rupiah($cart->price) }} <p>/ {{ $cart->qty }}x print</p></h4>
        </td>
        <td class="text-center detail-info" data-title="Stock"> </td>
        <td class="price" data-title="Price"></td>
        <td class="action text-center" data-title="Remove">
            <a href="{{ route('delete.cart', $cart->id) }}" class="text-body" onclick="javascript:return confirm('Hapus produk ini ?')">
                <i class="fi-sr-trash"></i>
            </a>
        </td>
    </tr>
    <!-- modal desain -->
    <div class="modal fade" id="desainModal{{ $cart->id }}" tabindex="-1" role="dialog" aria-labelledby="desainModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="desainModalTitle"><b>Desain produkku</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="far fa-times-square"></i>
                    </button>
                </div>
                <div class="modal-body detail-desain">
                    @if ($cart->design)
                        @foreach (json_decode($cart->design) as $design)
                            <p>Design {{ $loop->iteration }}</p>
                            @php $ext = strtolower(pathinfo($design)['extension']) @endphp
                            @if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'tif')
                                <img src="{{ url('assets/images/design-upload/' . $design) }}" alt="" class="img-desain d-block">
                            @elseif($ext == 'pdf')
                                <img src="{{ url('assets/images/logo/pdf.png') }}" alt="" class="img-desain d-block">
                            @elseif($ext == '7z' || $ext == 'zip' || $ext == 'rar')
                                <img src="{{ url('assets/images/logo/logo_rar.png') }}" alt="" class="img-desain d-block">
                            @endif
                        @endforeach
                    @else
                        No Design
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

<script>
    $(document).ready(function() {
        $(".form-note").hide();
        $(".update-note").on('click', function() {
            let note = $(this).data("note");
            $(`#note${note}`).slideToggle("fast");
        });
        var data = '<p><br></p><p><br></p><p><strong style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. </span><br></p><p><br></p><p><br></p>';
        while (data.startsWith('<p><br></p>')) {
            data = data.replace('<p><br></p>', '')
        }

        while (data.endsWith('<p><br></p>')) {
            data = data.replace(new RegExp('<p><br></p>$'), '')
        }
    });
    const obj  = JSON.parse(localStorage.getItem('LUMISE-CART-DATA'));
    document.getElementById("name").innerHTML = obj.LAHTD547['name'];
    document.getElementById("screenshot").src = obj.LAHTD547['screenshot'];
</script>
