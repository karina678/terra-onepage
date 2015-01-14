<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 */

if (!isset($bodyClass)) {
    $bodyClass = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title><?php echo $title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Princess+Sofia' rel='stylesheet' type='text/css'>

    <link href="skin/css/styles.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="skin/js/utils.js"></script>
</head>

<body class="<?php echo $bodyClass; ?>">
