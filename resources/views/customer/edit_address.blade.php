@extends('layouts.profile')
@section('profile')
    @php
        if (isset($address->coordinate)) :
        $coord = explode(',', $address->coordinate);
        else :
        $coord[0] = -7.065076535253742;
        $coord[1] = 110.42755767388537;
        endif;
    @endphp

    <div class="card shadow p-3">
        <x-alert />
        <x-auth.validate-error />
        <form action="{{ route('save.address') }}" method="POST" class="form-horizontal formAddProduct">
            @csrf
            <input type="hidden" name="id" value="{{ $address?->id ?? '' }}">
            <x-input type="text" name="rt_rw" value="no value" placeholder="Contoh: 01/05" hidden/>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <b>Alamat</b> <br />
                            @if (isset($address))
                                <input class="form-control" type="text" name="address" id="address" value="{{ $address->address }}">
                            @else
                                <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <b>Provinsi</b> <br />
                            <x-select2 name="province" id="province" class="form-control">
                                @if (isset($address))
                                    <option value="{{ $address->province_id ?? '' }}" selected>{{ $address->province->province_name ?? '' }}</option>
                                @else
                                    <option value="" selected hidden disabled>Pilih Provinsi</option>
                                @endif
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->province_id ?? '' }}">{{ $province->province_name ?? '' }}</option>
                                @endforeach
                            </x-select2>
                        </div>
                        <div class="col-md-6 mt-4">
                            <b>Kota</b> <br />
                            <x-select2 name="city" id="city" class="form-control" readonly>
                                @isset($address)
                                    <option value="{{ $address->city->city_id ?? '' }}" selected>{{ $address->city->city_name ?? '' }}</option>
                                @endisset
                            </x-select2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <b>Kecamatan</b> <br />
                            <x-select2 name="suburb" id="suburb" class="form-control" readonly>
                                @isset($address)
                                    <option value="{{ $address->suburb->suburb_id ?? '' }}" selected>{{ $address->suburb->suburb_name ?? '' }}</option>
                                @endisset
                            </x-select2>
                        </div>
                        <div class="col-md-6 mt-4">
                            <b>Kelurahan/Kode Pos</b> <br />
                            <x-select2 name="postcode" id="postcode" class="form-control" readonly>
                                @isset($address)
                                    <option value="{{ $address->postcode->postcode_id ?? '' }}" selected>{{ $address->postcode->sub_district ?? '' }} - {{ $address->postcode->postcode ?? '' }}</option>
                                @endisset
                            </x-select2>
                            <small style="font-size: 10px; color: red">*bila kode pos tidak di temukan silahkan untuk menghubungi pusat layanan, terima kasih</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <div class="mb-3 form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Koordinate google maps (Optional) <br>
                                    <small class="text-info">*Isi alamat google maps bila menggunakan jasa GOSEND</small>
                                </label>
                                <div class="col-sm-10 mt-5">
                                    <input id="pac-input" class="form-control controls mb-2" type="text" placeholder="Cari alamat" />
                                    <div id="map"></div>
                                    <input type="hidden" class="form-control mb-2" id="lat" name="lat" value="{{ old('lat') ?? $coord[0] }}" readonly>
                                    <input type="hidden" class="form-control mb-2" id="lng" name="lng" value="{{ old('lng') ?? $coord[1] }}" readonly>
                                    <a href="javascript:;" class="ml-3 text-danger text-large" id="current-location" onclick="getLocation()"><i class="fi-sr-marker"></i> Gunakan lokasi saat ini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="margin-top: 8px;"> Update Alamat </button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?= env('MAPS_KEY') ?>&callback=initAutocomplete&libraries=places" async></script>
    <script>
        window.lat_php = "<?= $coord[0] ? $coord[0] : -7.065076535253742 ?>";
        window.long_php = "<?= $coord[0] ? $coord[1] : 110.42755767388537 ?>";
    </script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="https://app.indoprinting.co.id/assets/js/edit_address.js?v=1.1"></script>

@endsection