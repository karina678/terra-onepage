<?php
/**
 * Created by Karina Hinkelthein
 * 22.03.2016
 */

error_reporting(0);

include('../php/utils.php');

$title = 'Geolocation' . getTitleDefault();
$extraJs = 'geolocation.js';
$extraCss = 'geolocation.css';
$externalSource = '<script src="https://maps.google.com/maps/api/js"></script>';

include('../templates/head.phtml');
include('../templates/header.phtml');
?>

    <main>
        <section>
            <h1 class="article-title"><span>Geolocation</span> <time datetime="2016-02-29">29 February 2016</time></h1>

            <p class="note">To test this feature you have to allow your browser to use your location data.</p>

            <p>
                This is a little test of what is possible using the Geolocation API<a href="#w3spec" class="footnote-link">[1]</a> - it is rather very basic.<br />
                To visualize the results, Google's Maps API<a href="#google-api" class="footnote-link">[2]</a> is used.<br />
                For a quick introduction to the Geolocation API and further links see the article
                &ldquo;Using geolocation&rdquo;<a href="#mdn" class="footnote-link">[3]</a> on Mozilla Developer Network.
            </p>
        </section>

        <section>
            <h2>Introductory Notes</h2>
            <p>
                The API is accessible via the <code class="language-js">navigator.geolocation</code> object.<br />
                You can check if a user's browser supports the API like so:
            </p>
<pre><code class="language-js">if (navigator.geolocation) {
        // Do your magic here...
        }</code></pre>

            <p>
                When you use the object's <code class="language-js">getCurrentPosition()</code> method, the
                values it returns may not be very accurate. The accuracy depends on various factors.
                One is the information your browser uses to get the location data.
                This information is sent to a location service, which then returns the data it has calculated.
            </p>
            <figure>
                <figcaption>List of some possible information sources sent to location services:</figcaption>
                <ul>
                    <li>GPS</li>
                    <li>Wifi</li>
                    <li>IP address</li>
                    <li>Mobile networks</li>
                </ul>
            </figure>

            <p>
                For instance when I check my location in Mozilla Firefox and Google Chrome on the same notebook, I get different results.
                At my current position (and the time of writing), in Firefox the accuracy level is 199&thinsp;001 meters, in Chrome it's 36 meters - that's a rather big difference.<br />
                For detailed information about accuracy, see <a href="https://dev.w3.org/geo/api/spec-source.html#introduction" target="_blank">the spec</a> or the article
                &ldquo;HTML5 Geolocation API - how accurate is it, really?&rdquo;<a href="#accuracy" class="footnote-link">[4]</a>
            </p>
        </section>

        <section>
            <h2><code class="language-js">getCurrentPosition()</code> - And your current position in numbers</h2>
            <p>
                First let's look at the plain data that can be retrieved from the API.<br />
                Note that not all data is available on all devices (e.g. &ldquo;altitude&rdquo; on desktop devices).
            </p>

            <p>
                With <code class="language-js">getCurrentPosition()</code> you can - surprise! surprise! - retrieve a user's current position.
                The method can have 3 parameters: callback method in case of success, callback method in case of failure and an object where you can define some options.
            </p>

<pre class="line-numbers"><code class="language-js">navigator.geolocation.getCurrentPosition(
        successCallback,
        errorCallback,
        options
        );</code>
</pre>

            <p>
                The <em>success callback</em> function is provided with a <code class="language-js">position</code> parameter.
                It's attributes are the <code class="language-js">Coordinates</code> object and a timestamp.
            </p>

            <p>Example usage:</p>
<pre class="line-numbers"><code class="language-js">function logPosition(position) {
        // The Coordinates object:
        console.log(position.coords);
        // Attributes of the Coordinates object:
        console.log(position.coords.latitiude);
        console.log(position.coords.longitude);
        console.log(position.coords.altitude);
        }</code>
</pre>

            <p>
                <code class="language-js">Coordinates</code>'s attribute values for your current position are:
            </p>

            <div class="responsive-container">
                <table id="position"></table>
            </div>

            <dl>
                <dt>Quotes from the spec:</dt>
                <dd>
                    <blockquote>
                        The accuracy attribute denotes the accuracy level of the latitude and longitude coordinates. It is specified in meters [...]
                    </blockquote>
                </dd>

                <dd>
                    <blockquote>
                        The altitude attribute denotes the height of the position, specified in meters above the <a href="https://dev.w3.org/geo/api/spec-source.html#ref-wgs">[WGS84]</a> ellipsoid.
                    </blockquote>
                </dd>

                <dd>
                    <blockquote>
                        The heading attribute denotes the direction of travel of the hosting device and is specified in degrees, where 0&deg; &le; heading &lt; 360&deg;, counting clockwise relative to the true north.
                    </blockquote>
                </dd>

                <dd>
                    <blockquote>
                        The speed attribute [...] is specified in meters per second.
                    </blockquote>
                </dd>
            </dl>

            <p>
                The only parameter in the <em>error callback</em> function is the <code class="language-js">PositionError</code> object.
                It contains the attributes <code class="language-js">code</code> and <code class="language-js">message</code>.
                Unlike what I expected, the <code class="language-js">message</code> attribute is not intended to be presented to the user,
                but for debugging purposes.
            </p>

            <p>
                In the <code class="language-js">PositionOptions</code> object you can define the following:
                <figure>
                    <ul>
                        <li><code class="language-js">enableHighAccuracy</code> (defaults to false)</li>
                        <li><code class="language-js">timeout</code> (in milliseconds)</li>
                        <li><code class="language-js">maximumAge</code> (defaults to 0)</li>
                    </ul>
                </figure>
                For further details, please consult <a href="https://dev.w3.org/geo/api/spec-source.html#position-options" target="_blank">the specifiation on PositionOptions</a>.
            </p>
        </section>

        <section>
            <h2>Your current position in a map</h2>
            <p>
                The data retrieved by the <code class="language-js">getCurrentPosition()</code> method can be used to mark your location in, for instance, a Google Map.<br />
                Tutorials for that are widespread around the internet, so I won't describe details here.
            </p>
            <p>
                <button type="button" id="show-static-position">Show me in the map</button>
            </p>
            <div id="map" class="map"></div>
        </section>

        <section>
            <h2>Your distance to Fiji Islands</h2>
            <p>
                And of course you can use it to calculate your distance to other places, if you know their coordinates.<br />
                (I used Gourav Singh's code for the calculation<a href="#distance-calc" class="footnote-link">[5]</a>.)
            </p>
            <p>
                For instance the coordinates of Fiji Islands is -18.137499745333116 latitude and 177.989501953125 longitude.<br />
                So you are <em id="distance"></em> away from Fiji.
            </p>
            <p>
                <button type="button" id="static-fiji-position">Show Fiji &amp; me</button>
            </p>
            <div id="stat-fiji-map" class="map"></div>
        </section>

        <section>
            <h2>Tracking your movement</h2>

            <p>
                Your position data can change: either because your device is moving or because the accuracy of the geo information increases.
                The <code class="language-js">watchPosition()</code> is used to define a callback for that.
            </p>

            <p>It returns an ID, which is used in the <code class="language-js">clearWatch()</code> method.</p>

            <p>So, to start watching a position, call:</p>
<pre class="line-numbers"><code class="language-js">// Parameters in the callback functions and the options object are the same as for getCurrentPosition().
        var watcherId = navigator.geolocation.watchPosition(
        successCallback,
        errorCallback,
        options
        );</code></pre>

            <p>To stop it, use:</p>
            <pre class="line-numbers"><code class="language-js">navigator.geolocation.clearWatch(watcherId);</code></pre>

            <p>
                You can test this feature if you click the "Start watching me" button.<br />
                And because watching one's position drains one's battery, you can stop it by clicking the "Stop it" button.
            </p>

            <p>
                <button type="button" id="start-watching">Start watching me</button>
                <button type="button" id="stop-watching">Stop it</button>
            </p>

            <p>First, just watch the raw data changing:</p>
            <table id="move-data">
                <tr><th>Latitude:</th><td id="move-lat">-</td></tr>
                <tr><th>Longitude:</th><td id="move-long">-</td></tr>
            </table>

            <p>And now follow yourself in a map:</p>
            <div id="moving-map" class="map"></div>
            <div><i>Map is generated after clicking the "Start watching me" button.</i></div>
            <p>
                (Updating the map as described in Mike Dalisay's article<a href="#track-move-map" class="footnote-link">[6]</a>.)
            </p>
        </section>

        <footer>
            <h2>Sources:</h2>

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
                        HTML5 Geolocation API - how accurate is it, really?
                    </a>
                </li>
                <li id="distance-calc" data-number="5">
                    <a href="http://blog.gouravsingh.com/2014/11/06/calculate-distance-from-current-position-using-geolocation-api-html5/">
                        Calculate distance using Geolocation API HTML5.
                    </a>
                </li>
                <li id="track-move-map" data-number="6">
                    <a href="https://www.codeofaninja.com/2013/08/navigator-geolocation-watchposition.html">
                        Working with Geolocation watchPosition() API
                    </a>
                </li>
                <li data-number="7">
                    Eric Freeman, Elisabeth Robson: HTML5-Programmierung von Kopf bis Fu&szlig;: Webanwendungen mit HTML5 und JavaScript (O'Reilly 2012)<br />
                    (english title: Head First HTML5 Programming)
                </li>
            </ol>
        </footer>
    </main>

<?php include('../templates/footer.phtml'); ?>