@auth
    <div class="row shipping_calculator">
        <div class="form-group col-lg-12">
            <div class="custom_select">
                <select class="form-control" name="pickup_method" id="pickup-method" onclick="getDeliveryChooice()">
                    <option value="">Pilih pengiriman...</option>
                    <option value="Self-pickup">Ambil Sendiri ke Outlet</option>
                    <option value="Delivery">Jasa Pengiriman</option>
                </select>
                <small class="text-danger">@error('pickup_method') Harus pilih @enderror</small>
            </div>
        </div>
    </div>
@endauth
@guest
    <input type="hidden" name="pickup_method" value="Self-pickup">
@endguest
@guest
    <div class="row shipping_calculator">
        <div class="form-group col-lg-12">
            <div class="custom_select">
                <select class="form-control" name="alamat_outlet" id="alamat-outlet" required>
                    <option value="">Pilih alamat pickup...</option>
                    @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->name }}">
                            {{ $outlet->name.' ('.$outlet->address.')' }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endguest
@auth
    <div class="row shipping_calculator">
        <div class="form-group col-lg-12">
            <div class="custom_select">
                <select class="form-control" name="alamat_outlet" id="alamat-outlet" style="display: none" required>
                    <option value="">Pilih alamat pickup...</option>
                    @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->name }}">
                            {{ $outlet->name.' ('.$outlet->address.')' }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endauth
