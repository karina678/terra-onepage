<?php
/**
 * Created by Karina Hinkelthein
 * 28.02.2016
 */
error_reporting(0);

$isRootLevel = true;

include('php/utils.php');

$title = 'Sources' . getTitleDefault();

include('templates/head.phtml');
include('templates/header.phtml');
?>

    <main>
        <section>
        <h1>Sources</h1>

        <p>All article specific sources are listed at the end of those articles.</p>

        <p>Further sources:</p>
        <ul>
            <li>Code syntax highlighting: <a href="http://prismjs.com/">Prism.js</a>  by <a href="http://lea.verou.me/">Lea Verou</a> and <a href="https://github.com/LeaVerou/prism/contributors">others</a></li>
        </ul>
        </section>
    </main>

<?php include('templates/footer.phtml'); ?>