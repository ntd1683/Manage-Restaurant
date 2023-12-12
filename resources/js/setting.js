//region Google Maps
import {Loader} from "@googlemaps/js-api-loader"

const apiKeyGoogleMap = import.meta.env.VITE_GOOGLE_MAPS_API_KEY;

const loader = new Loader({
    apiKey: apiKeyGoogleMap, version: "weekly",
    libraries: ["places", "marker"],
});

let mapConfirm = false;

document.addEventListener("DOMContentLoaded", () => {
    const inputSearch = document.getElementById("address");

    let valLat = document.getElementById("lat").value;
    let valLng = document.getElementById("lng").value;
    let lat, lng;

    if (valLat.length > 0) {
        lat = valLat;
    } else {
        lat = 10.800664;
    }

    if (valLng.length > 0) {
        lng = valLng;
    } else {
        lng = 106.712588;
    }

    if (lat.length > 0 && lng.length > 0) {
        inputSearch.style.border = "1px solid green";
        mapConfirm = true;
    }
    loader.load().then(() => {

        const mapLatLng = new google.maps.LatLng(lat, lng);

        const map = new google.maps.Map(document.getElementById("map"), {
            center: mapLatLng, zoom: 18, mapTypeControl: false,
        });

        const marker = new google.maps.Marker({
            position: mapLatLng,
            map: map
        })

        inputSearch.addEventListener("focus", () => {
            const addressAutoComplete = new google.maps.places.Autocomplete(inputSearch);
            addressAutoComplete.bindTo("bounds", map);
            google.maps.event.addListener(addressAutoComplete, "place_changed", () => {
                let placeObj = addressAutoComplete.getPlace();
                marker.setPosition(placeObj.geometry.location);
                map.setCenter(placeObj.geometry.location);
                document.getElementById("lat").value = placeObj.geometry.location.lat();
                document.getElementById("lng").value = placeObj.geometry.location.lng();

                inputSearch.style.border = "1px solid green";
                mapConfirm = true;
            });
        });
    });
});
//endregion

//region Validate
let error = {};

const form = document.getElementById("form-setting");

const validateEmail = (email) => /\S+@\S+\.\S+/.test(email);

const validate = () => {
    error = "";

    const inpEmail = document.getElementById("email");
    const email = inpEmail.value;

    const inpPhone = document.getElementById("phone");
    const phone = inpPhone.value;

    let isError = false;
    if (!mapConfirm) {
        error.map = " Please choose a address on map";
        isError = true;
    }

    if (email.length === 0) {
        error.email = "; Please enter a email address";

        inpEmail.style.border = "1px solid red";
        inpEmail.style.color = "red";

        isError = true;
    } else if (!validateEmail(email)) {
        error.mail = "; Please enter a proper email";

        inpEmail.style.border = "1px solid red";
        inpEmail.style.color = "red";

        isError = true;
    }

    if (phone.length === 0) {
        error.phone = "; Please enter a phone number";

        inpPhone.style.border = "1px solid red";
        inpPhone.style.color = "red";

        isError = true;
    } else if (phone.length < 6 || phone.length > 15) {
        error.phone = "; Please enter a proper phone number";

        inpPhone.style.border = "1px solid red";
        inpPhone.style.color = "red";

        isError = true;
    }

    return isError;
};

form.addEventListener("submit", (e) => {
    e.preventDefault();

    if (validate()) {
        document.getElementById("error-message").innerHTML = Object.values(error).join("<br>");
    } else {
        form.submit();
    }
});
//endregion

