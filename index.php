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
</main>

<?php include_once('templates/footer.phtml'); ?>