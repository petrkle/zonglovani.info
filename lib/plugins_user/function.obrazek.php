<?php

function smarty_function_obrazek($params, &$smarty)
{
    extract($params);
    if (!isset($path)) {
        $path = '/img/';
    }
    if (!isset($popisek)) {
        $popisek = '';
    }
    $link = $path.substr($soubor, 0, 1).'/'.$soubor;
    $soubor = $_SERVER['DOCUMENT_ROOT'].$path.substr($soubor, 0, 1).'/'.$soubor;
    if (!is_file($soubor)) {
        $soubor = $_SERVER['DOCUMENT_ROOT'].'/img/m/missing.png';
        $link = '/img/m/missing.png';
    }
    $rozmery = getimagesize($soubor);
    if (isset($absolute)) {
        $abs = 'https://'.$_SERVER['SERVER_NAME'];
    } else {
        $abs = '';
    }
    if ($rozmery[0] > IMG_RESPONSIVE_WIDTH) {
        $velikost = 'class="photo"';
    } else {
        $velikost = $rozmery[3];
    }

    if (isset($class)) {
        $class = ' class="'.$class.'" ';
    } else {
        $class = '';
    }

    return '<img src="'.$abs.$link.'" '.$velikost.' title="'.$popisek.'" alt="'.$popisek.'" '.$class.'/>';
}
