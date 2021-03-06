<?php
/**
 * Created by Karina Hinkelthein
 * 15.11.2014
 *
 * Utility functions for quick access.
 */

function getHomeLink() {
    return '<a href="../" class="logo">terra-karina  <span>trying out web things</span></a>';
}

function getTitleDefault() {
    return ' | terra-karina.de';
}

function getPageHeadline($isHomePage = false) {
    if ($isHomePage) {
        return '<h1 class="logo">terra-karina <span>trying out web things</span></h1>';
    }

    return getHomeLink();
}

function getRootPath($isRootLevel = false) {
    return $isRootLevel ? '' : '../';
}

function getCopyRightText() {
    $text = '&copy; Karina Hinkelthein 2014';

    if (date('Y') > '2014') {
        $text .= '-' . date('Y');
    }

    return $text;
}

/**
 * Get extra JavaScript files that are only needed on certain pages.
 *
 * @param string $filenames
 * @return string
 */
function getJavascript($filenames = '', $isRootLevel) {
    if (!$filenames) {
        return '';
    }

    $filenames = explode(',', $filenames);
    $scriptIncludes = '';
    $skinPath = getRootPath($isRootLevel);

    if (is_array($filenames)) {
        foreach ($filenames as $filename) {
            $scriptIncludes .= '<script type="text/javascript" src="' . $skinPath . 'skin/js/' . $filename . '"></script>';
        }
    } else {
        $scriptIncludes .= '<script type="text/javascript" src="' . $skinPath . 'skin/js/' . $filenames . '"></script>';
    }

    return $scriptIncludes;
}

function getCss($filenames = '', $isRootLevel) {
    if (!$filenames) {
        return '';
    }

    $filenames = explode(',', $filenames);
    $cssIncludes = '';
    $skinPath = getRootPath($isRootLevel);

    if (is_array($filenames)) {
        foreach ($filenames as $filename) {
            $cssIncludes .= '<link href="' . $skinPath . 'skin/css/' . $filename . '" rel="stylesheet" type="text/css" />';
        }
    } else {
        $cssIncludes .= '<link href="' . $skinPath . 'skin/css/' . $filenames . '" rel="stylesheet" type="text/css" />';
    }

    return $cssIncludes;
}

function getExternalSource($externalSource = '') {
    if (!$externalSource) {
        return '';
    }

    $externalSource = explode(',', $externalSource);
    $sources = '';

    if (is_array($externalSource)) {
        foreach ($externalSource as $source) {
            $sources = $source;
        }
    } else {
        $sources = $externalSource;
    }

    return $sources;
}