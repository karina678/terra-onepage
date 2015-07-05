<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */
error_reporting(0);

include('php/utils.php');

$title = '404 Page not found ' . getTitleDefault();

include('templates/head.phtml');
include('templates/header.phtml');
?>

<main>
    <section>
        <h1>404 - Page not found</h1>

        <p>
            I'm afraid, the page you were looking for does not exist (anymore).
        </p>

        <p>
            <a href="./">back to homepage</a>
        </p>
    </section>
</main>

<?php include('templates/footer.phtml'); ?>