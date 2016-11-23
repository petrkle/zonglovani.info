<?php

function smarty_modifier_mailobfuscate($string)
{
    $tecka = '<img src="/img/t/tecka.png" width="5" height="20" alt="tečka" />';
    $zavinac = '<img src="/img/z/zavinac.serif.png" width="16" height="15" alt="zavináč" />';

    $navrat = '<span class="kontakt">';
    $adr = explode('@', $string);
    $pred = str_replace('.', $tecka, $adr[0]);
    $po = str_replace('.', $tecka, $adr[1]);
    $navrat .= $pred.$zavinac.$po;
    $navrat .= '</span>';

    return $navrat;
}
