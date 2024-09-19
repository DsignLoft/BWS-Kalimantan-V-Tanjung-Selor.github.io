{{--<div class="kurir">--}}
    @if ($raja_ongkir)
        <div class="row shipping_calculator">
            <div class="form-group col-lg-12">
                <div class="custom_select">
                    <select class="form-control" name="ongkos_kirim" id="ongkos-kirim" style="display: none" required>
                        <option value="">Pilih kurir...</option>
                        @if ($gosend)
                            <optgroup label="Gosend">
                                @foreach ($gosend as $gosend)
                                    @if ($gosend->serviceable)
                                        <option value="{{ "{$gosend->shipment_method},,{$gosend->price->total_price},,{$gosend->shipment_method_description},,Gosend" }}">
                                            {{ "{$gosend->shipment_method} - {$gosend->price->total_price} (Estimasi $gosend->shipment_method_description)" }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endif
                        @foreach ($raja_ongkir as $ongkir)
                            <optgroup label="{{ $ongkir->name }}">
                                @foreach ($ongkir->costs as $cost)
                                    @if ($cost->description != 'Same Day')
                                        <option value="{{ "{$cost->description},,{$cost->cost[0]->value},,{$cost->cost[0]->etd},,{$ongkir->name}" }}">
                                            {{ $cost->description . ' - ' . rupiah($cost->cost[0]->value) . " (Estimasi {$cost->cost[0]->etd} days)" }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <small style="color:green;font-size: 10px;">
                    Pengiriman dilakukan setelah produk selesai dicetak. produk dikirim di jam
                    kerja pada jam 09.00 - 15.00, diluar jam kerja akan kami kirim dihari
                    berikutnya.
                </small>
            </div>
        </div>
    @else
        <div class="text-center mt-3 text-danger">
            Harap masukkan alamat lengkap untuk menggunakan jasa pengiriman (Kurir).
            klik <a class="text-info" href="{{ route('edit.address') }}">disini</a> untuk update alamat.
        </div>
    @endif
{{--</div>--}}

<a href="javascript:;" data-toggle="modal" data-target="#confirmAlamat"></a>
<div class="modal fade" id="confirmAlamat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmAlamatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-justify">
                Pastikan nomor telepon pelanggan bisa dihubungi (by whatsapp/telp) dan titik alamat di peta sudah sesuai.
                Klik <a href="{{ route('edit.address') }}" target="_blank">sunting alamat</a> untuk mengedit alamat. Gagal pengiriman karena kesalahan titik alamat bukan tanggung jawab kami.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>