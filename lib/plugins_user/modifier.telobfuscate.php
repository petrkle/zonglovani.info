<?php

function smarty_modifier_telobfuscate($string)
{
    $tecka = '<img src="/img/t/tecka.png" width="5" height="20" alt="tečka" />';
    $zavinac = '<img src="/img/z/zavinac.png" width="20" height="20" alt="zavináč" />';
    $string = preg_replace('/^\+420 /', '', $string);
    $string = preg_replace('/ /', '&nbsp;&nbsp;', $string);
    $cislo = '';
    $sady = array('r', 'a', 'i', 'c');
    $popisky = array(
        '+' => 'plus',
        '0' => 'kolečko',
        '1' => 'jedna',
        '2' => 'dva',
        '3' => 'tři',
        '4' => 'čtyři',
        '5' => 'pět',
        '6' => 'šest',
        '7' => 'sedm',
        '8' => 'osm',
        '9' => 'devět',
        );
    $max = count($sady) - 1;
    foreach (str_split($string) as $znak) {
        if (is_numeric($znak)) {
            $cislo .= '<img src="/img/t/tel-'.$sady[rand(0, $max)].''.$znak.'.png" height="21" width="17" alt=" '.$popisky[$znak].' " />';
        } else {
            $cislo .= $znak;
        }
    }

    $navrat = '<span class="kontakt">';
    $navrat .= $cislo;
    $navrat .= '</span>';

    return $navrat;
}
