<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */


$title = 'terra-karina.de';
$bodyClass = 'home';
$isHomePage = true;

include('php/utils.php');
include_once('templates/head.phtml');
?>

<?php include_once('templates/header.phtml'); ?>

<main>
    <section id="what-is-this-place">
        <h2>What is this Place?</h2>

        <ul>
            <li>
                place to train my dev skills (frontend), like:
                <ul>
                    <li>accessibility</li>
                    <li>shiny css stuff</li>
                    <li>blinking javascript without jquery and the like</li>
                    <li>usability with javascript turned off/not available in user's browser</li>
                    <li>fonts/icon fonts</li>
                    <li>svg</li>
                    <li>audio</li>
                    <li>video</li>
                    <li>performance</li>
                    <li>maybe some canvas??</li>
                    <li>box-shadow über eck (siehe ecp)</li>
                </ul>
            </li>
            <li>show those skills off</li>
        </ul>

        <strong>What this place is not:</strong>
        <ul>
            <li>some features may not work in all browsers - given that this is an experimentation site i try to mainly use current/new features. in some cases of course the point is to make features work in as many browsers as possible (or available for my testing).</li>
            <li>tutorial (i recommend rummaging in the code)</li>
        </ul>
    </section>

    <section id="accessible-modal-window">
        <h2>Accessible modal window</h2>

        <p>
            when a modal window opens, focus should move from the element that triggered it to an element inside of the modal, preferably a close button. This enables a keyboard or screen reader user to easily tab and find their way to new content on the screen. When the modal window is closed, focus should be sent back to the triggering element.
        </p>
        <footer>
            <cite>
                http://substantial.com/blog/2014/07/22/how-i-audit-a-website-for-accessibility/
            </cite>
        </footer>
    </section>

    <section id="drag-and-drop">
        <h2>A little bit of Drag & Drop</h2>
    </section>

    <section id="inspiration">
        <h2>Inspiration</h2>

        <ul>
            <li>
                <a href="https://www.mozilla.org/de/firefox/os/">FirefoxOS website</a>
            </li>
        </ul>
    </section>
</main>

<?php include_once('templates/footer.phtml'); ?>