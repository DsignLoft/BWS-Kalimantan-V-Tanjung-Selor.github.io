@extends('layouts.maps')
@section('main')
    <div class="container-fluid mt-3" bis_skin_checked="1">
        <div class="row" bis_skin_checked="1">
            <div class="col" bis_skin_checked="1">
                <h3 class="mb-3 mt-2">Tinggi Muka Air</h3>
            </div>
        </div>
        <div class="row" bis_skin_checked="1">
            <div class="d-none d-md-block col-md-2" bis_skin_checked="1">
                <ul class="list-group" style="height: 70vh; overflow: scroll;">
                    <li class="bg-primary text-white list-group-item">Daftar Pos :</li>
                    @foreach($hydrology as $h)
                        <li class="list-group-item" style="cursor: pointer;">{{ $loop->iteration }}. {{ $h->sh_title }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-10" bis_skin_checked="1">
                <div id='map'></div>
            </div>
        </div>
    </div>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var yellowIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var blueIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        let map, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            map = L.map('map', {
                center: {
                    lat: -7.7925927,
                    lng: 110.3658812,
                },
                zoom: 9
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Â© OpenStreetMap'
            }).addTo(map);

            map.on('click', mapClicked);
            initMarkers();
        }
        initMap();

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(
                    `<div class='container' style='width:600px'>
                        <div class='row'>
                            <div class='col-md-6'>
                                <h3><b>${data.title}</b></h3>
                                <p>Device ID: <b>${data.device}</b></p>
                                <p>Lokasi: <b>${data.loct}</b></p>
                                <p>Kabupaten: <b>${data.kab}</b></p>
                                <p>Provinsi: <b>${data.prov}</b></p>
                                <p>Koordinat: <b>${data.position.lat}, ${data.position.lng}</b></p>
                                <p>Updated: <b>${data.update}</b></p>
                            </div>
                            <div class='col-md-6'>
                                <img src='${data.img}' style='width: 220px; height: 170px' />
                                <div class="rectangle"> 
                                    <h3 style='font-weight: bold'>TMA : ${data.tma} cm</h3>
                                </div>
                                <div class='row'>
                                    <div class="nsm-ct">
                                        <div class="nsm-box" style='background-color: #50c878'><p>200cm<p></div>
                                        <div class="nsm-box" style='background-color: #E4D00A'><p>300cm<p></div>
                                        <div class="nsm-box" style='background-color: #FF8C00'><p>400cm<p></div>
                                        <div class="nsm-box" style='background-color: #FF5733'><p>500cm<p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`
                , {
                    maxWidth : 550
                });
                map.panTo(data.position);
                markers.push(marker)
            }
        }

        function generateMarker(data, index) {
            if (data.clr == 'greenIcon') {
                var iconColor = greenIcon;
            } else if (data.clr == 'yellowIcon') {
                var iconColor = yellowIcon;
            } else if (data.clr == 'blueIcon') {
                var iconColor = blueIcon;
            } else if (data.clr == 'redIcon') {
                var iconColor = redIcon;
            } else {
                var iconColor = redIcon;
            }
            return L.marker(data.position, {
                    draggable: data.draggable,
                    icon: iconColor
                })
                .on('click', (event) => markerClicked(event, index))
                .on('dragend', (event) => markerDragEnd(event, index));
        }

        /* ------------------------- Handle Map Click Event ------------------------- */
        function mapClicked($event) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        /* ------------------------ Handle Marker Click Event ----------------------- */
        function markerClicked($event, index) {
            console.log(map);
            console.log($event.latlng.lat, $event.latlng.lng);
        }

        /* ----------------------- Handle Marker DragEnd Event ---------------------- */
        function markerDragEnd($event, index) {
            console.log(map);
            console.log($event.target.getLatLng());
        }
    </script>
@endsection