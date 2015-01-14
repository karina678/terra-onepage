<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 *
 * Utility functions for quick access.
 */

function getHomeLink() {
    return '<a href="" class="home-link">Home</a>';
}

function getTitleDefault() {
    return '| terra-karina.de';
}

function getCopyRightText() {
    $text = '&copy; Karina Hinkelthein 2014';

    if (date('Y') > '2014') {
        $text .= '-' . date('Y');
    }

    return $text;
}