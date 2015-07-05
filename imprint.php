<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */

include('php/utils.php');

$title = 'Imprint ' . getTitleDefault();

include('templates/head.phtml');
include('templates/header.phtml');
?>

<main>
    <section>
        <h1>Imprint</h1>
        <p>Insert imprint text here!</p>
    </section>
</main>

<?php include_once('templates/footer.phtml'); ?>