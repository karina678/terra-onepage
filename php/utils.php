<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 *
 * Utility functions for quick access.
 */

function getHomeLink() {
    return '<a href="./" class="logo">terra-karina</a>';
}

function getTitleDefault() {
    return '| terra-karina.de';
}

function getPageHeadline($isHomePage = false, $headline = false) {
    if ($isHomePage || !$headline) {
        return '<h1 class="logo">terra-karina <span>trying out web things</span></h1>';
    }

    $html = getHomeLink();
    $html .= '<h1>' . $headline . '</h1>';

    return $html;
}

function getCopyRightText() {
    $text = '&copy; Karina Hinkelthein 2014';

    if (date('Y') > '2014') {
        $text .= '-' . date('Y');
    }

    return $text;
}