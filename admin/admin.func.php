<?php

function get_login_stat($loginy)
{
    $prihlaseni = array();

    foreach ($loginy as $login) {
        $fn = LIDE_DATA.'/'.$login.'/prihlaseni.txt';
        if (is_readable($fn)) {
            $prihlaseni[$login]['vse'] = file($fn);
            $prihlaseni[$login]['login'] = $login;
            $prihlaseni[$login]['jmeno'] = get_name($login);
            $prihlaseni[$login]['pocet'] = count($prihlaseni[$login]['vse']);
            $poprve = preg_split('/\*/', $prihlaseni[$login]['vse'][0]);
            $poprve = date('j. n. Y H.i', $poprve[0]);
            $prihlaseni[$login]['poprve'] = $poprve;

            $naposled = preg_split('/\*/', $prihlaseni[$login]['vse'][$prihlaseni[$login]['pocet'] - 1]);
            $naposled = date('j. n. Y H.i', $naposled[0]);
            $prihlaseni[$login]['naposled'] = $naposled;
        }
    }

    usort($prihlaseni, 'sort_by_last_logon');

    return $prihlaseni;
}

function sort_by_last_logon($a, $b)
{
    $posledni_a = preg_split('/\*/', array_pop($a['vse']));
    $posledni_b = preg_split('/\*/', array_pop($b['vse']));

    return ($posledni_a[0] > $posledni_b[0]) ? -1 : 1;
}

function get_login_detail($login)
{
    $prihlaseni = array();
    $fn = LIDE_DATA.'/'.$login.'/prihlaseni.txt';
    if (is_readable($fn)) {
        $foo = file($fn);
        foreach ($foo as $radek) {
            $radek = preg_split('/\*/', trim($radek));
            array_push($prihlaseni, array('cas' => $radek[0], 'cas_hr' => date('j. n. Y H.i', $radek[0]), 'ip' => $radek[1], 'prohlizec' => $radek[2]));
        }
    }

    return $prihlaseni;
}
