@extends('layouts.auth')
@section('auth-page')
<form class="form" method="POST" action="{{ route('tanpa.register') }}">
    @csrf
    <div class="form-group row">
        <label class="form-label col-md-4">Nama
            <x-important />
        </label>
        <div class="col-md-8">
            <x-input type="text" name="name" value="{{ old('name') }}" />
        </div>
    </div>
    <div class="form-group row">
        <label class="form-label col-md-4">No. HP
            <x-important />
        </label>
        <div class="col-md-8">
            <x-input type="text" name="phone" value="{{ old('phone') }}" />
        </div>
    </div>
    <div class="border border-disabled p-3">
        <div class="form-group row">
            <label class="form-label col-md-4">Alamat</label>
            <div class="col-md-8">
                <x-textarea name="address" rows="3">{{ old('address') }}</x-textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">RT/RW</label>
            <div class="col-sm-8">
                <x-input type="text" name="rt-rw" placeholder="Contoh: 01/05" />
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Provinsi</label>
            <div class="col-sm-8">
                <x-select2 name="province" id="province" data-placeholder="Pilih provinsi">
                    <option value=""></option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->province_id }}" {{ old('province')==$province->province_id ?
                        "selected":"" }}>
                        {{ $province->province_name }}</option>
                    @endforeach
                </x-select2>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Kota/ Kabupaten</label>
            <div class="col-md-8">
                <x-select2 name="city" id="city" disabled>
                </x-select2>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Kecamatan</label>
            <div class="col-md-8">
                <x-select2 name="suburb" id="suburb" disabled>
                </x-select2>
            </div>
        </div>
        <small class="text-info text-center">isi alamat - kecamatan jika ingin menggunakan jasa delivery/kurir</small>
    </div>
    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary w-100">Checkout</button>
    </div>
</form>
<a href="{{ route('loginPage') }}">
    <div class="login">Kembali Login</div>
</a>
<script>
    $(document).ready(function() {
        // $(".select2").select2({
        //     theme: "bootstrap4",
        // });
        $('#province').on("change", function() {
            let data = "id=" + $(this).val();
            $.ajax({
                type: 'POST',
                url: `/profile/get-city`,
                data: data,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(hasil) {
                    $('#city').prop('disabled', false);
                    $('#city').html(hasil);
                    $('#city').trigger('change');
                }
            });
        });
        $('#city').on("change", function() {
            let data = "id=" + $(this).val();
            $.ajax({
                type: 'POST',
                url: `/profile/get-suburb`,
                data: data,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(hasil) {
                    $('#suburb').prop('disabled', false);
                    $('#suburb').html(hasil);
                }
            });
        });
    });
</script>
@endsection