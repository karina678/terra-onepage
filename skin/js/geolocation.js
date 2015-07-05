/**
 * Created by Karina Hinkelthein
 * 04.07.2015
 */

window.addEventListener('load', startLocating, false);

function startLocating() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionData, locationError);
    } else {
        showErrorMessage('Your browser does not support the Geolocation API.');
    }
}

/**
 * Show various info data about the user's current position.
 *
 * @param position
 */
function showPositionData(position) {
    var latitude    = position.coords.latitude;
    var longitude   = position.coords.longitude;
    var infoList    = document.getElementById('position');
    var infoItems   = '';

    // Create list of position information.
    for (var positionInfo in position.coords) {
        var infoValue = position.coords[positionInfo] ? position.coords[positionInfo] : '<i>not available</i>';

        infoItems += '<tr><th>' + positionInfo + '</th>';
        infoItems += '<td>' + infoValue + '</td></tr>';
    }
    infoList.innerHTML = infoItems;

    // Show user's distanc to Fiji Islands.
    var fijiCoords = {
        latitude: -18.137499745333116,
        longitude: 177.989501953125
    };
    document.getElementById('distance').innerHTML = getDistance(position.coords, fijiCoords) + ' km';

    // Show user's position in a Google Map.
    getMap(latitude, longitude);
}

/**
 * Create a Google Map.
 *
 * @param latitude
 * @param longitude
 */
function getMap(latitude, longitude) {
    var container   = document.getElementById('map');
    var latLong     = new google.maps.LatLng(latitude, longitude);
    var mapOptions  = {
        center: latLong,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(container, mapOptions);

    var marker = new google.maps.Marker({
        position: latLong,
        map: map,
        title: 'Here you are!'
    });
}

/**
 * Calculate the distance between two positions.
 *
 * @param startCoords
 * @param targetCoords
 * @returns {number}
 */
function getDistance(startCoords, targetCoords) {
    var startLatRads = degreeInRadiant(startCoords.latitude);
    var startLongRads = degreeInRadiant(startCoords.longitude);
    var targetLatRads = degreeInRadiant(targetCoords.latitude);
    var targetLongRads = degreeInRadiant(targetCoords.longitude);
    var radius = 6371; // earth's radius in km

    var distance = Math.acos(Math.sin(startLatRads) * Math.sin(targetLatRads) +
        Math.cos(startLatRads) * Math.cos(targetLatRads) *
        Math.cos(startLongRads - targetLongRads)) * radius;
    distance = Math.round(distance * 100) / 100;

    return distance.toLocaleString();
}

/**
 * Convert degrees to radiant.
 *
 * @param degree
 * @returns {number}
 */
function degreeInRadiant(degree) {
    return (degree * Math.PI) / 180;
}

/**
 * Handle errors thrown by the Geolocation API.
 *
 * @param error
 */
function locationError(error) {
    showErrorMessage(error.message);
}

/**
 * Show error messages on page.
 *
 * @param message
 */
function showErrorMessage(message) {
    var errorNote = document.createElement('p');
    errorNote.className = 'error';
    errorNote.innerHTML = message;
    document.querySelector('section').insertBefore(errorNote, document.querySelector('p.note'));
}

/**
 * Convert coordinates from degree to decimal.
 *
 * @param degree
 * @param minute
 * @param seconds
 * @returns {*}
 */
function degreeToDecimal(degree, minute, seconds) {
    return degree + (minute / 60.0) + (seconds / 3600.00);
}