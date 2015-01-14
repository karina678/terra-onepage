<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */

include('php/utils.php');

$title = 'Imprint ' . getTitleDefault();
include_once('templates/header.php');
?>

<header>
    <h1>Imprint</h1>

    <?php echo getHomeLink(); ?>
</header>

<main>
    <p>Insert imprint text here!</p>
</main>

<?php include_once('templates/footer.php');