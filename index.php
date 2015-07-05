<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */
error_reporting(0);

$title = 'terra-karina.de';
$bodyClass = 'home';
$isHomePage = true;

$extraJs = 'geolocation.js';
$extraCss = 'geolocation.css';
$externalSource = '<script src="http://maps.google.com/maps/api/js?sensor=true"></script>';

include('php/utils.php');
include('templates/head.phtml');
include('templates/header.phtml');
?>

<main>
    <section>
        <h2>Geolocation</h2>

        <p class="note">To test this feature you have to allow you browser to use your location data.</p>

        <p>
            This is a little test of what is possible using the <a href="http://dev.w3.org/geo/api/spec-source.html">Geolocation API</a>.<br />
            To visualize the results, <a href="https://www.google.com/intx/en_uk/work/mapsearth/products/mapsapi.html">Google's Maps API</a> is used.
        </p>

        <p>
            When you use the API's <code>getCurrentPosition()</code> method, the
            coordinates it returns may not be very accurate. This depends on different things - not only devices.
            For instance when I check my location in Mozilla Firefox and Google Chrome on the same notebook, I get rather different results
            (Chrome is more accurate).<br/>
            What causes those differences I don't know, yet - but I'm hoping to find out to add the info here.
        </p>

        <p>
            This page will keep on growing as I intend to try more things the Geolocation API has to offer - like keeping track
            of a user's movement.
        </p>
    </section>

    <section>
        <h3>Your current position in numbers</h3>
        <p>
            First the plain data that can be retrieved from the Coordinates object.<br />
            Note that not all data is available on all devices (e.g. &ldquo;altitude&rdquo; on desktop devices).
        </p>
        <div id="position"></div>
    </section>

    <section>
        <h3>Your current position in a map</h3>
        <p>This data can be used to mark your location in, for instance, a Google Map.</p>
        <div id="map" class="map"></div>
    </section>

    <section>
        <h3>Your distance to Fiji Islands</h3>
        <p>And of course you can use it to calculate your distance to other places, if you know their coordinates.</p>
        <p>
            You are <em id="distance"></em> away from Fiji.
        </p>

        <p>
            <small><i>to be continued...</i></small>
        </p>
    </section>
</main>

<?php include('templates/footer.phtml'); ?>