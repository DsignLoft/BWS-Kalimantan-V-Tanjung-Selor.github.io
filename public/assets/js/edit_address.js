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
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
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
