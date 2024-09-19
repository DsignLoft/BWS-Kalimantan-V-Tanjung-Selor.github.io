<form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data" id="formDetail">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id_product }}">

    @if ($product->discount == 0)
        <input type="hidden" name="discount" value="0">
    @else
        @php
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d G:i:s');
        @endphp
        @if ($product->discount_time > $timestamp)
            <input type="hidden" name="discount" value="{{ $product->discount_price }}">
        @else
            <input type="hidden" name="discount" value="0">
        @endif
    @endif

    @if ($product->category == 17)
        <input type="hidden" name="no_design" value="1">
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Isian & Pilihan</th>
                <th width="20%">Harga</th>
            </tr>
        </thead>
        <tbody>

        @if ($product->desc_size == 1)
            <tr>
                <td>Ukuran ({{ $product->unit_measure }})</td>
                <td class="nol">
                    <div class="row">
                        <div class="col-md-4">
                            <x-input type="number" id="length_predic" min="5" step="any" value="5" oninput="getVal()" />
                            <small style="color: #3bb77e; font-size: 10px">*Minimal 5cm</small>
                            <br>
                            <small style="color: #3bb77e; font-size: 10px">*Maksimal 45cm</small>
                        </div>
                        <div class="col-md-4">
                            <x-input type="number" id="width_predic" min="5" step="any" value="5" oninput="getVal()" />
                            <small style="color: #3bb77e; font-size: 10px">*Minimal 5cm</small>
                            <br>
                            <small style="color: #3bb77e; font-size: 10px">*Maksimal 30cm</small>
                        </div>
                        <div class="col-md-4">
                            <p id="show_all" style="font-size: 15px;"></p>
                        </div>
                    </div>
                </td>
                <td class="text-right js-text-block"></td>
                <script type="text/javascript">
                    function getVal() {
                        var get_length = document.querySelector('#length_predic').value;
                        var get_width = document.querySelector('#width_predic').value;
                        var show_length = {{ $product->print_area_length }} / get_length
                        var show_width = {{ $product->print_area_width }} / get_width
                        var get_all = show_length * show_width
                        document.querySelector('#show_all').innerHTML = "1 Lembar {{ $product->desc_print }} <br>("+(Math.round(get_all))+" pcs)";
                        console.log(get_all);
                    }
                </script>
            </tr>
        @endif

            @if ($product->category == 25)
                <tr>
                    <td>Cover</td>
                    <td class="nol">
                        <x-select name="atb1" id="atb1">
                            @foreach ($materials->material_name as $idm => $m_name)
                                {{ $m_value = "Cover,,$m_name,,{$materials->material_price[$idm]},,{$materials->material_code[$idm]},,{$materials->material_qty[$idm]},,{$materials->material_range[$idm]},,{$materials->material_category[$idm]}" }}
                                <option value="{{ $m_value }}" {{ old('atb1') == $m_value ? 'selected' : '' }}>
                                    {{ $m_name }}
                                </option>
                            @endforeach
                        </x-select>
                    </td>
                    <td class="bahan-price text-right"></td>
                </tr>
            @else
                <tr>
                    <td>Jenis Bahan</td>
                    <td class="nol">
                        <x-select name="atb1" id="atb1">
                            @foreach ($materials->material_name as $idm => $m_name)
                                {{ $m_value = "Material,,$m_name,,{$materials->material_price[$idm]},,{$materials->material_code[$idm]},,{$materials->material_qty[$idm]},,{$materials->material_range[$idm]},,{$materials->material_category[$idm]}" }}
                                <option value="{{ $m_value }}" {{ old('atb1') == $m_value ? 'selected' : '' }}>
                                    {{ $m_name }}
                                </option>
                            @endforeach
                        </x-select>
                    </td>
                    <td class="bahan-price text-right"></td>
                </tr>
            @endif
            @if (in_array($product->category, [11, 21, 26]) && $product->customize == 1)
                @if($product->lock_panjang == 1)
                    <tr>
                        <td>Panjang ({{ $product->unit_measure }})</td>
                        <td class="nol">
                            <x-select name="panjang" id="panjang">
                                <option value="{{ $product->panjang }}">
                                    {{ $product->panjang }}
                                </option>
                            </x-select>
                        </td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <td>Panjang ({{ $product->unit_measure }})</td>
                        <td class="nol">
                            <x-input type="number" name="panjang" id="panjang" step="any" value="{{ old('panjang') }}" />
                        </td>
                        <td></td>
                    </tr>
                @endif

                @if($product->lock_lebar == 1)
                    <tr>
                        <td>Lebar ({{ $product->unit_measure }})</td>
                        <td class="nol">
                            <x-input type="number" name="lebar" id="lebar" step="any" value="{{ $product->lebar }}" readonly />
                        </td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <td>Lebar ({{ $product->unit_measure }})</td>
                        <td class="nol">
                            <x-input type="number" name="lebar" id="lebar" step="any" value="{{ old('lebar') }}" />
                        </td>
                        <td></td>
                    </tr>
                @endif
            @else
                @if (count($sizes->size) == 1)
                    <div class="d-none">
                        <x-select name="atb0" id="atb0">
                            {{ $v_size = "Ukuran,,{$sizes->size[0]},,{$sizes->price[0]}" }}
                            <option value="{{ $v_size }}" selected></option>
                        </x-select>
                    </div>
                @else
                    <tr>
                        <td>Ukuran</td>
                        <td class="nol">
                            <x-select name="atb0" id="atb0">
                                @foreach ($sizes->size as $ids => $size)
                                    {{ $v_size = "Ukuran,,$size,,{$sizes->price[$ids]}" }}
                                    <option value="{{ $v_size }}" {{ old('atb0') == $v_size ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                            </x-select>
                        </td>
                        <td></td>
                    </tr>
                @endif
            @endif
            @foreach ($attributes->name as $id => $name)
                @php
                    $no = $loop->iteration + 1;
                @endphp
                @if ($product->id_product == 288)
                    <tr>
                        <td><span id="atb-name{{ $no }}"><?= $name ?> (Jumlah Halaman)</span></td>
                        <td class="nol">
                            <div class="row">
                                <div class="col-sm-8">
                                    <x-select class="form-control atb" name="atb{{ $no }}" id="atb{{ $no }}" data-atb="{{ $no }}">
                                        @foreach ($attributes->value->value_name[$id] as $i => $vn)
                                            {{ $v_atb = "$name,,$vn,,{$attributes->value->value_price[$id][$i]},,{$attributes->value->value_code[$id][$i]},,{$attributes->value->value_qty[$id][$i]},,{$attributes->value->value_range[$id][$i]}" }}
                                            <option value="{{ $v_atb }}" {{ old("atb$no") == $v_atb ? 'selected' : '' }}>{{ $vn }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                <div class="col-sm-4">
                                    <x-input type="number" name="qty_isi" id="qty_isi" min="1" value="1" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" placeholder="Jumlah" />
                                </div>
                            </div>
                        </td>
                        <td class="atb-text{{ $no }}  text-right"></td>
                    </tr>
                @else
                    <tr>
                        <td><span id="atb-name{{ $no }}"><?= $name ?></span></td>
                        <td class="nol">
                            <div class="row">
                                <div class="col-sm-12">
                                    <x-select class="form-control atb" name="atb{{ $no }}" id="atb{{ $no }}" data-atb="{{ $no }}">
                                        @foreach ($attributes->value->value_name[$id] as $i => $vn)
                                            {{ $v_atb = "$name,,$vn,,{$attributes->value->value_price[$id][$i]},,{$attributes->value->value_code[$id][$i]},,{$attributes->value->value_qty[$id][$i]},,{$attributes->value->value_range[$id][$i]}" }}
                                            <option value="{{ $v_atb }}" {{ old("atb$no") == $v_atb ? 'selected' : '' }}>{{ $vn }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
{{--                                <div class="col-sm-4">--}}
{{--                                    <x-input type="number" name="qty_isi" id="qty_isi" min="1" value="1" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" placeholder="Jumlah" />--}}
{{--                                </div>--}}
                            </div>
                        </td>
                        <td class="atb-text{{ $no }}  text-right"></td>
                    </tr>
                @endif
            @endforeach
            <input type="hidden" name="count" value="{{ 2 + count($attributes->name) }}">
            <tr>
                <td>Jumlah Order</td>
                <td class="nol">
                    <x-input type="number" name="qty" id="qty" min="{{ $product->min_order }}" value="{{ old('qty') ?? $product->min_order }}" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" />
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td></td>
                <td class="total-harga text-right"></td>
            </tr>
            @if ($product->discount == 1)
                @php
                    $tz = 'Asia/Jakarta';
                    $dt = new DateTime("now", new DateTimeZone($tz));
                    $timestamp = $dt->format('Y-m-d G:i:s');
                @endphp
                @if ($product->discount_time > $timestamp)
                    <tr>
                        <td>Discount</td>
                        <td></td>
                        <td class="discount text-right">{{ rupiah($product->discount_price) }}</td>
                    </tr>
                @endif
            @endif
        </tbody>
    </table>
    <!-- note -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="padding-bottom: 5px;"><b class="product-note">Catatan </b> </label>
        <div class="col-sm-12">
            <x-textarea style="width: 100%; height: 200px;" class="form-control" value="{{ old('note') }}" name="note" id="product_note"></x-textarea>
        </div>
    </div>
    @include('product._form_upload')
    <div class="chek-form">
        <div class="custome-checkbox">
            <input class="form-check-input" type="checkbox" name="term" id="term" value="1" {{ old('term') == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="term"><span>Saya telah meninjau dan menyetujui Design yang sudah saya kirim.</span></label>
        </div>
    </div>
    <div class="detail-extralink mb-50">
        <div class="product-extra-link2">
            <button type="submit" class="button button-add-to-cart tombol-beli submit"><i class="fi-sr-plus"></i>Keranjang</button>
            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" id="wishlist"><i class="fi-sr-heart"></i></a>
        </div>
    </div>

</form>
