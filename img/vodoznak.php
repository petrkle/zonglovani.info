<?php

if (!isset($_GET['img'])) {
    exit();
}
require '../cache.php';
http_cache_headers(3600, true);

if (isset($_GET['galerie'])) {
    $obrazek = $_SERVER['DOCUMENT_ROOT'].'/obrazky/'.$_GET['img'];
} else {
    $obrazek = $_SERVER['DOCUMENT_ROOT'].'/img/'.$_GET['img'];
}

$podpis = $_SERVER['DOCUMENT_ROOT'].'/img/v/vodoznak.png';

if (is_readable($podpis) and is_readable($obrazek)) {
    $podpis_info = getimagesize($podpis);
    $obrazek_info = getimagesize($obrazek);
    $pod = imagecreatefrompng($podpis);

    if ($obrazek_info['mime'] == 'image/jpeg') {
        $obr = imagecreatefromjpeg($obrazek);
        if ($obrazek_info[0] < $podpis_info[0]) {
            imagecopyresampled($obr, $pod, 0, $obrazek_info[1] - $podpis_info[1], 0, 0, $obrazek_info[0], $podpis_info[1], $podpis_info[0], $podpis_info[1]);
        } else {
            imagecopy($obr, $pod, $obrazek_info[0] - $podpis_info[0], $obrazek_info[1] - $podpis_info[1], 0, 0, $podpis_info[0], $podpis_info[1]);
        }
        header('Content-Type: image/jpeg');
        imagejpeg($obr);
        imagedestroy($obr);
        exit();
    } elseif ($obrazek_info['mime'] == 'image/png') {
        $obr = imagecreatefrompng($obrazek);
        if ($obrazek_info[0] > 50 and $obrazek_info[1] > 15) {
            //označovat jen větší obrázky
            if ($obrazek_info[0] < $podpis_info[0]) {
                imagecopyresampled($obr, $pod, 0, $obrazek_info[1] - $podpis_info[1], 0, 0, $obrazek_info[0], $podpis_info[1], $podpis_info[0], $podpis_info[1]);
            } else {
                imagecopy($obr, $pod, $obrazek_info[0] - $podpis_info[0], $obrazek_info[1] - $podpis_info[1], 0, 0, $podpis_info[0], $podpis_info[1]);
            }
        }
        header('Content-Type: image/png');
        imagepng($obr);
        imagedestroy($obr);
        exit();
    } else {
        http_response_code(404);
        exit();
    }
}
