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
            This is a little test of what is possible using the Geolocation API<a href="#w3spec" class="footnote-link">[1]</a>.<br />
            To visualize the results, Google's Maps API<a href="#google-api" class="footnote-link">[2]</a> is used.<br />
            For a quick introduction to the Geolocation API and further links see the article
            &ldquo;Using geolocation&rdquo;<a href="#mdn" class="footnote-link">[3]</a> on Mozilla Developer Network.
        </p>
    </section>

    <section>
        <h3>Notes</h3>
        <p>
            When you use the API's <code>getCurrentPosition()</code> method, the
            coordinates it returns may not be very accurate. The accuracy depends on various factors.
            One is the information your browser uses to get the location data.<br />
            This information (one of the following) is sent to a location service, which then returns the data it has calculated.
        </p>
        <ul>
            <li>GPS</li>
            <li>Wifi</li>
            <li>IP address</li>
            <li>Mobile networks</li>
        </ul>

        <p>
            For instance when I check my location in Mozilla Firefox and Google Chrome on the same notebook, I get rather different results.
            In Firefox the accuracy level (for me) is 199001 meters, in Chrome it's 36 meters - that's a rather big difference.<br />
            For detailed information about accuracy see the article
            &ldquo;HTML5 Geolocation API – how accurate is it, really?&rdquo;<a href="#accuracy" class="footnote-link">[4]</a>
        </p>
    </section>

    <section>
        <h3>Your current position in numbers</h3>
        <p>
            First let's look at the plain data that can be retrieved from the Coordinates object.<br />
            Note that not all data is available on all devices (e.g. &ldquo;altitude&rdquo; on desktop devices).
        </p>
        <div class="responsive-container">
            <table id="position"></table>
        </div>
        <p>
            To get this data, all you have to do is execute the following code:
            <code class="block">
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);
            </code>
        </p>
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

    <footer>
        <dl>
            <dt>Sources:</dt>
            <dd>
                <ol class="link-list footnotes">
                    <li id="w3spec" data-number="1">
                        <a href="http://dev.w3.org/geo/api/spec-source.html">
                            W3C Specification Geolocation API
                        </a>
                    </li>
                    <li id="google-api" data-number="2">
                        <a href="https://www.google.com/intx/en_uk/work/mapsearth/products/mapsapi.html">
                            Google Maps API
                        </a>
                    </li>
                    <li id="mdn" data-number="3">
                        <a href="https://developer.mozilla.org/en-US/docs/Web/API/Geolocation/Using_geolocation">
                            Using geolocation - Mozilla Developer Network
                        </a>
                    </li>
                    <li id="accuracy" data-number="4">
                        <a href="http://www.andygup.net/html5-geolocation-api-%E2%80%93-how-accurate-is-it-really/">
                            HTML5 Geolocation API – how accurate is it, really?
                        </a>
                    </li>
                </ol>
            </dd>
        </dl>
    </footer>
</main>

<?php include('templates/footer.phtml'); ?>