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
<link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<style>
    .modal{
        z-index:50;
    }
    .modal-backdrop{
        z-index: 40;
    }
</style>

<div class="card shadow p-3">
    <x-alert />
    <x-auth.validate-error />
    @if($address == null)
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <b>Alamat</b> <br />
                    Belum terisi
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <b>Kota</b> <br />
                    Belum terisi
                </div>
                <div class="col-md-6 mt-4">
                    <b>Provinsi</b> <br />
                    Belum terisi
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <b>Kecamatan</b> <br />
                    Belum terisi
                </div>
                <div class="col-md-6 mt-4">
                    <b>RT/RW</b> <br />
                    Belum terisi
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <b>Alamat</b> <br />
                    {{ old('address') ?? $address->address }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <b>Kota</b> <br />
                    {{ $address->city->city_name }}
                </div>
                <div class="col-md-6 mt-4">
                    <b>Provinsi</b> <br />
                    {{ $address->province->province_name }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <b>Kecamatan</b> <br />
                    {{ $address->suburb->suburb_name }}
                </div>
                <div class="col-md-6 mt-4">
                    <b>RT/RW</b> <br />
                    {{ old('rt_rw') ?? $address->rt_rw }}
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<button type="button" id="edit-address-value" class="btn btn-success btn-block" data-toggle="modal" data-target="#tambahAlamat" style="margin-top: 8px;"> Update Alamat </button>
<form action="{{ route('save.address') }}" method="POST" class="form-horizontal formAddProduct">
    <div class="modal fade" id="tambahAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel" style="font-family: 'Arial Black'">Update Alamat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if (!$address == null) :?>
                        <div id="smartwizard">
                            <ul class="nav">
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-1"><div class="num">1</div>Cari lokasi pengirimanmu</a></li>
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-2"><div class="num">2</div>Tentukan pinpoint lokasi</a></li>
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-3"><div class="num">3</div>Lengkapi detail alamat</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $address?->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- gmaps -->
                                            <div class="form-group row">
                                                <div class="col-sm-12 mt-2">
                                                    <h5 style="font-family: 'Arial Black'">Di mana lokasi tujuan pengirimanmu?</h5>
                                                    <input id="pac-input" class="controls ml-0" type="text" placeholder="Tulis nama jalan / gedung /perumahan" />
                                                    <br/>
                                                    <a href="#step-3" style="color: darkgray; margin-top: 4px; font-size: 15px;">Mau cara lain? Isi alamat secara manual</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    <div id="map" style="display: none"></div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javascript:;" class="ml-3 text-danger text-large" id="current-location" onclick="getLocation()" style="display: none"><i class="fas fa-map-marker-alt"></i> Gunakan Lokasi Saat Ini</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="https://indoprinting.co.id/edit-address" class="ml-3 text-danger text-large" id="search-again" style="display: none"><i class="fas fa-search"></i> Cari Ulang Alamat</a>
                                        </div>
                                    </div>
                                    <input type="text" id="lat" name="lat" value="{{ $coord[0] ?? $coord[0] = '' }}" hidden readonly>
                                    <input type="text" id="lng" name="lng" value="{{ $coord[1] ?? $coord[1] = '' }}" hidden readonly>
                                </div>

                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $address?->id }}">
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Alamat</label>
                                                <div class="col-sm-12">
                                                    <x-textarea name="address" id="address" rows="4" style="width: 100%;">
                                                        {{ old('address') ?? $address?->address }}
                                                    </x-textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Provinsi</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="province" id="province">
                                                        @if (isset($address))
                                                        <option value="{{ $address->province_id }}" selected>{{ $address->province->province_name }}</option>
                                                        @else
                                                        <option value="" selected hidden disabled>Pilih Provinsi</option>
                                                        @endif
                                                        @foreach ($provinces as $province)
                                                        <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                                        @endforeach
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Kota/Kabupaten</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="city" id="city" disabled>
                                                        @isset($address)
                                                        <option value="{{ $address->city->city_id }}" selected>{{ $address->city->city_name }}</option>
                                                        @endisset
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Kecamatan</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="suburb" id="suburb" disabled>
                                                        @isset($address)
                                                        <option value="{{ $address->suburb->suburb_id }}" selected>{{ $address->suburb->suburb_name }}</option>
                                                        @endisset
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">RT/RW</label>
                                                <div class="col-sm-12">
                                                    <x-input type="text" name="rt_rw" value="{{ old('rt_rw') ?? $address?->rt_rw }}" placeholder="Contoh: 01/05" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Pastikan Lokasi dan Alamat anda benar agar pesanan cepat sampai</h6>
                                            <button class="btn btn-info btn-block" type="submit">Update Alamat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div id="smartwizard">
                            <ul class="nav">
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-1"><div class="num">1</div>History pinpoint lokasi</a></li>
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-2"><div class="num">2</div>Ubah lokasi pengirimanmu</a></li>
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-3"><div class="num">3</div>Tentukan pinpoint lokasi</a></li>
                                <li class="nav-item"><a style="background-color: #FFFFFF;" class="nav-link" href="#step-4"><div class="num">4</div>Lengkapi detail alamat</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                    <iframe style="width: 100%; height: 70vh" src = "https://maps.google.com/maps?q={{ $coord[0] }},{{ $coord[1] }}&hl=es;z=14&amp;output=embed"></iframe>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#step-2" class="ml-3 text-danger text-large" id="search-again"><i class="fas fa-search"></i> Cari Ulang Alamat</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $address?->id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- gmaps -->
                                            <div class="form-group row">
                                                <div class="col-sm-12 mt-2">
                                                    <h5 style="font-family: 'Arial Black'">Di mana lokasi tujuan pengirimanmu?</h5>
                                                    <input id="pac-input" class="controls ml-0" type="text" placeholder="Tulis nama jalan / gedung /perumahan" />
                                                    <br/>
                                                    <a href="#step-3" style="color: darkgray; margin-top: 4px; font-size: 15px;">Mau cara lain? Isi alamat secara manual</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                    <div id="map"></div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javascript:;" class="ml-3 text-danger text-large" id="current-location" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i> Gunakan Lokasi Saat Ini</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#step-2" class="ml-3 text-danger text-large" id="search-again"><i class="fas fa-search"></i> Cari Ulang Alamat</a>
                                        </div>
                                    </div>
                                    <input type="text" id="lat" name="lat" value="{{ $coord[0] }}" hidden readonly>
                                    <input type="text" id="lng" name="lng" value="{{ $coord[1] }}" hidden readonly>
                                </div>
                                <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $address?->id }}">
                                        <div class="col-md-12">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Alamat</label>
                                                <div class="col-sm-12">
                                                    <x-textarea name="address" id="address" rows="4" style="width: 100%;">
                                                        {{ old('address') ?? $address?->address }}
                                                    </x-textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Provinsi</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="province" id="province">
                                                        @if (isset($address))
                                                        <option value="{{ $address->province_id }}" selected>{{ $address->province->province_name }}</option>
                                                        @else
                                                        <option value="" selected hidden disabled>Pilih Provinsi</option>
                                                        @endif
                                                        @foreach ($provinces as $province)
                                                        <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>
                                                        @endforeach
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Kota/Kabupaten</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="city" id="city" disabled>
                                                        @isset($address)
                                                        <option value="{{ $address->city->city_id }}" selected>{{ $address->city->city_name }}</option>
                                                        @endisset
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">Kecamatan</label>
                                                <div class="col-sm-12">
                                                    <x-select2 name="suburb" id="suburb" disabled>
                                                        @isset($address)
                                                        <option value="{{ $address->suburb->suburb_id }}" selected>{{ $address->suburb->suburb_name }}</option>
                                                        @endisset
                                                    </x-select2>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-12 col-form-label">RT/RW</label>
                                                <div class="col-sm-12">
                                                    <x-input type="text" name="rt_rw" value="{{ old('rt_rw') ?? $address?->rt_rw }}" placeholder="Contoh: 01/05" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Pastikan Lokasi dan Alamat anda benar agar pesanan cepat sampai</h6>
                                            <button class="btn btn-info btn-block" type="submit">Update Alamat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= env('MAPS_KEY') ?>&callback=initAutocomplete&libraries=places" async></script>
<script>
    window.lat_php = "<?= $coord[0] ? $coord[0] : -7.065076535253742 ?>";
    window.long_php = "<?= $coord[0] ? $coord[1] : 110.42755767388537 ?>";
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            justified: true,
            autoAdjustHeight: true,
            backButtonSupport: true,
            enableUrlHash: true,
            transition: {
                animation: 'none',
                speed: '400',
                easing: '',
                prefixCss: '',
                fwdShowCss: '',
                fwdHideCss: '',
                bckShowCss: '',
                bckHideCss: '',
            },
            toolbar: {
                position: 'bottom',
                showNextButton: true,
                showPreviousButton: true,
                extraHtml: ''
            },
            anchor: {
                enableNavigation: true,
                enableNavigationAlways: false,
                enableDoneState: true,
                markPreviousStepsAsDone: true,
                unDoneOnBackNavigation: false,
                enableDoneStateNavigation: true
            },
            keyboard: {
                keyNavigation: true,
                keyLeft: [37],
                keyRight: [39]
            },
            lang: {
                next: 'Selanjutnya',
                previous: 'Sebelumnya'
            },
            disabledSteps: [],
            errorSteps: [],
            warningSteps: [],
            hiddenSteps: [],
            getContent: null
        });
    });

    <?php if (!$address == null) :?>
    $('#pac-input').blur(function()
    {
        if( $(this).val() ) {
            location.href = '#step-2';
            document.getElementById('map').style.display = "block";
            document.getElementById('current-location').style.display = "block";
            document.getElementById('search-again').style.display = "block";
        } else {
            document.getElementById('map').style.display = "none";
            document.getElementById('current-location').style.display = "none";
            document.getElementById('search-again').style.display = "none";
        }
    });
    <?php else: ?>
    $('#pac-input').blur(function()
    {
        if( $(this).val() ) {
            location.href = '#step-3';
            document.getElementById('map').style.display = "block";
            document.getElementById('current-location').style.display = "block";
            document.getElementById('search-again').style.display = "block";
        } else {
            document.getElementById('map').style.display = "none";
            document.getElementById('current-location').style.display = "none";
            document.getElementById('search-again').style.display = "none";
        }
    });
    <?php endif; ?>



</script>
<script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            prompt("Get current location not support this browser");
        }
    }

    function showPosition(position) {
        window.lat_php = position.coords.latitude;
        window.long_php = position.coords.longitude;
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: parseFloat(window.lat_php),
                lng: parseFloat(window.long_php),
            },
            zoom: 19,
            mapTypeId: "roadmap",
            mapTypeControl: false,
            streetViewControl: false,
        });
        marker = new google.maps.Marker({
            position: map.center,
            map: map,
        });
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lng").value = position.coords.longitude;
    }
    // gmaps
    let marker;

    function taruhMarker(peta, posisiTitik) {
        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta,
                title: place.name,
            });
        }

        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();
    }

    function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: parseFloat(window.lat_php),
                lng: parseFloat(window.long_php),
            },
            zoom: 19,
            mapTypeId: "roadmap",
            mapTypeControl: false,
            streetViewControl: false,
        });
        marker = new google.maps.Marker({
            position: map.center,
            map: map,
        });
        google.maps.event.addListener(map, "click", function (event) {
            taruhMarker(this, event.latLng);
        });
        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                taruhMarker(this, place.geometry.location);
                document.getElementById("lat").value =
                    place.geometry.location.lat();
                document.getElementById("lng").value =
                    place.geometry.location.lng();

                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    $(document).ready(function () {
        $(".select2").select2({
            theme: "bootstrap4",
        });

        if ($("#province").val() !== null) {
            $("#city").prop("disabled", false);
            $("#suburb").prop("disabled", false);
        } else {
            $("#city").prop("disabled", true);
            $("#suburb").prop("disabled", true);
        }

        $("#province").on("change", function () {
            let data = "id=" + $(this).val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "POST",
                url: `/ajax/get-city`,
                data: data,
                success: function (hasil) {
                    console.log(hasil);
                    $("#city").prop("disabled", false);
                    $("#suburb").prop("disabled", true);
                    $("#suburb").val("");
                    $("#city").html(hasil);
                    $("#city").trigger("change");
                },
            });
        });

        $("#city").on("change", function () {
            let data = "id=" + $(this).val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "POST",
                url: `/ajax/get-suburb`,
                data: data,
                success: function (hasil) {
                    $("#suburb").prop("disabled", false);
                    $("#suburb").html(hasil);
                    $("#suburb").trigger("change");
                },
            });
        });
    });

</script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

@endsection

{{--    <form action="{{ route('save.address') }}" method="POST" class="form-horizontal formAddProduct">--}}
    {{--        @csrf--}}
    {{--        <input type="hidden" name="id" value="{{ $address?->id }}">--}}
    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label">Alamat</label>--}}
        {{--            <div class="col-sm-10">--}}
            {{--                <x-textarea name="address" id="address" rows="2" style="width: 100%;">--}}
                {{--                    {{ old('address') ?? $address?->address }}--}}
                {{--                </x-textarea>--}}
            {{--            </div>--}}
        {{--        </div>--}}

    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label">RT/RW</label>--}}
        {{--            <div class="col-sm-10">--}}
            {{--                <x-input type="text" name="rt_rw" value="{{ old('rt_rw') ?? $address?->rt_rw }}" placeholder="Contoh: 01/05" />--}}
            {{--            </div>--}}
        {{--        </div>--}}

    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label">Provinsi</label>--}}
        {{--            <div class="col-sm-10">--}}
            {{--                <x-select2 name="province" id="province">--}}
                {{--                    @if (isset($address))--}}
                {{--                    <option value="{{ $address->province_id }}" selected>{{ $address->province->province_name }}</option>--}}
                {{--                    @else--}}
                {{--                    <option value="" selected hidden disabled>Pilih Provinsi</option>--}}
                {{--                    @endif--}}
                {{--                    @foreach ($provinces as $province)--}}
                {{--                    <option value="{{ $province->province_id }}">{{ $province->province_name }}</option>--}}
                {{--                    @endforeach--}}
                {{--                </x-select2>--}}
            {{--            </div>--}}
        {{--        </div>--}}

    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label">Kota/Kabupaten</label>--}}
        {{--            <div class="col-sm-10">--}}
            {{--                <x-select2 name="city" id="city" disabled>--}}
                {{--                    @isset($address)--}}
                {{--                    <option value="{{ $address->city->city_id }}" selected>{{ $address->city->city_name }}</option>--}}
                {{--                    @endisset--}}
                {{--                </x-select2>--}}
            {{--            </div>--}}
        {{--        </div>--}}

    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label">Kecamatan</label>--}}
        {{--            <div class="col-sm-10">--}}
            {{--                <x-select2 name="suburb" id="suburb" disabled>--}}
                {{--                    @isset($address)--}}
                {{--                    <option value="{{ $address->suburb->suburb_id }}" selected>{{ $address->suburb->suburb_name }}</option>--}}
                {{--                    @endisset--}}
                {{--                </x-select2>--}}
            {{--            </div>--}}
        {{--        </div>--}}

    <!-- gmaps -->
    {{--        <div class="form-group row">--}}
        {{--            <label for="name" class="col-sm-2 col-form-label mt-5">Koordinate google maps (Optional) <br>--}}
            {{--                <small class="text-info">Isi alamat google maps untuk menggunakan jasa GOSEND</small>--}}
            {{--            </label>--}}
        {{--            <div class="col-sm-10 mt-5">--}}
            {{--                <input id="pac-input" class="controls" type="text" placeholder="Cari alamat" />--}}
            {{--                <div id="map"></div>--}}
            {{--                <input type="text" id="lat" name="lat" value="{{ old('lat') ?? $coord[0] }}" readonly>--}}
            {{--                <input type="text" id="lng" name="lng" value="{{ old('lng') ?? $coord[1] }}" readonly>--}}
            {{--                <a href="javascript:;" class="ml-3 text-danger text-large" id="current-location" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i></a href=" javascript:;">--}}
            {{--            </div>--}}
        {{--        </div>--}}
    {{--        <div class="text-right">--}}
        {{--            <button class="btn btn-info" type="submit" disabled>Update Alamat</button>--}}
        {{--        </div>--}}


    {{--    </form>--}}