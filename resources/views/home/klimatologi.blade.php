@extends('layouts.maps')
@section('main')
    <div id='map'></div>
    <div class="scrollmenu">
      <a href="#home">1. Nama Kota</a>
    </div>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
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
                console.log(data);
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
                                <p>Hujan Otomatis : ${data.otomatis} mm</p>
                                <p>Hujan Manual : ${data.manual} mm</p>
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
            return L.marker(data.position, {
                    draggable: data.draggable
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