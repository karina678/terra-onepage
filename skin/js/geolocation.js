/**
 * Created by Karina Hinkelthein
 * 04.07.2015
 */

var watcherId = null;
var trackingMap = null;

window.addEventListener('load', startLocating, false);

function startLocating() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionData, locationError);
        setEventHandlers();
    } else {
        showErrorMessage('Your browser does not support the Geolocation API.');
    }
}

function setEventHandlers() {
    document.getElementById('show-static-position').addEventListener('click', showStaticPosition, false);
    document.getElementById('start-watching').addEventListener('click', watchPosition, false);
    document.getElementById('stop-watching').addEventListener('click', stopWatching, false);
}

/**
 * Show various info data about the user's current position.
 *
 * @param position
 */
function showPositionData(position) {
    var infoList    = document.getElementById('position');
    var infoItems   = '';

    // Create list of position information.
    for (var positionInfo in position.coords) {
        var infoValue = position.coords[positionInfo] ? position.coords[positionInfo] : '<i>not available</i>';

        infoItems += '<tr><th>' + positionInfo + '</th>';
        infoItems += '<td>' + infoValue + '</td></tr>';
    }
    infoList.innerHTML = infoItems;

    // Show user's distance to Fiji Islands.
    var fijiCoords = {
        latitude: -18.137499745333116,
        longitude: 177.989501953125
    };
    document.getElementById('distance').innerHTML = getDistance(position.coords, fijiCoords) + ' km';

    document.getElementById('static-fiji-position').addEventListener('click', function() {
        showStaticPlusFijiPosition(position.coords, fijiCoords);
    }, false);
}

// Show user's position in a Google Map.
function showStaticPosition() {
    staticMap = navigator.geolocation.getCurrentPosition(function(position) {
        getMap('map', position.coords.latitude, position.coords.longitude);
    }, locationError);
}

function showStaticPlusFijiPosition(statPos, fijiPos) {
    var mapOptions  = {
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('stat-fiji-map'), mapOptions);
    // This is used to center the map on several markers.
    var bounds = new google.maps.LatLngBounds();

    // Marker for user's position.
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(statPos.latitude, statPos.longitude),
        map: map
    });

    // Marker for Fiji.
    var fijiMarker = new google.maps.Marker( {
        position: new google.maps.LatLng(fijiPos.latitude, fijiPos.longitude),
        map: map
    });

    bounds.extend(marker.position);
    bounds.extend(fijiMarker.position);

    // Info window for user's position marker.
    var infoWindow = new google.maps.InfoWindow({map: map});
    infoWindow.setPosition({lat: statPos.latitude, lng: statPos.longitude});
    infoWindow.setContent('You are here');

    // Info window for Fiji's position marker.
    var fijiInfo = new google.maps.InfoWindow({map: map});
    fijiInfo.setPosition({lat: fijiPos.latitude, lng: fijiPos.longitude});
    fijiInfo.setContent('Fiji');

    // Center map to properly see both markers.
    map.fitBounds(bounds);
}

/**
 * Start watching a user's position.
 * Set "watcherId" which is used to stop the current watching.
 */
var moveMap = null;

function watchPosition() {
    moveMap = navigator.geolocation.getCurrentPosition(function(position) {
        var latLong     = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        var mapOptions  = {
            center: latLong,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        trackingMap = new google.maps.Map(document.getElementById('moving-map'), mapOptions);

    }, locationError);

    watcherId = navigator.geolocation.watchPosition(
        showPositionChanges,
        locationError,
        {
            enableHighAccuracy: true,
            maximumAge: 30000,
            timeout: 27000
        }
    );
}

/**
 * Stop watching the user's position.
 */
function stopWatching() {
    if (watcherId !== null) {
        navigator.geolocation.clearWatch(watcherId);
        watcherId = null;
        document.querySelectorAll('#move-data td').innerHTML = '';
        document.getElementById('moving-map').innerHTML = '';
    }
}

/**
 * Handle the user's position changes.
 *
 * @param position
 */
function showPositionChanges(position) {
    var latitude    = position.coords.latitude;
    var longitude   = position.coords.longitude;

    document.getElementById('move-lat').innerHTML = latitude;
    document.getElementById('move-long').innerHTML = longitude;

    // Set marker to new position.
    var marker = new google.maps.Marker({
        map: trackingMap,
        position: new google.maps.LatLng(
            latitude,
            longitude
        ),
        title: "Current Position"
    });

    // Center the map to new position.
    trackingMap.panTo(new google.maps.LatLng(
        latitude,
        longitude
    ));
}

/**
 * Create a Google Map.
 *
 * @param containerId
 * @param latitude
 * @param longitude
 */
function getMap(containerId, latitude, longitude) {
    var container   = document.getElementById(containerId);
    var latLong     = new google.maps.LatLng(latitude, longitude);
    var mapOptions  = {
        center: latLong,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(container, mapOptions);

    var infoWindow = new google.maps.InfoWindow({map: map});
    infoWindow.setPosition(latLong);
    infoWindow.setContent('Here you are!');

    var marker = new google.maps.Marker({
        position: latLong,
        map: map
    });
}

/**
 * Calculate the distance between two positions.
 * by Gourav Singh http://blog.gouravsingh.com/2014/11/06/calculate-distance-from-current-position-using-geolocation-api-html5/
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
    //console.error(message);

    var errorNote = document.createElement('p');
    errorNote.className = 'error';
    errorNote.innerHTML = 'An error has occurred. Please try again later';
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