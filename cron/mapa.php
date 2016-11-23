<?php

require '../init.php';
require '../func.php';
require '../lide/pusobiste.php';

$mista = array_merge(get_places('CZ', $pusobiste), get_places('SK', $pusobiste));
$zongleri = array();

foreach (get_loginy() as $login) {
    $foo = get_user_pusobiste($login);
    if (is_array($foo)) {
        $zongleri[$login] = get_user_props($login);
        $zongleri[$login]['pusobiste'] = $foo;
        foreach ($foo as $misto) {
            if (strlen($pusobiste[$misto]['lat']) > 0) {
                $mista[$misto]['lide'][$login] = $zongleri[$login];
            }
        }
    }
}

$smarty->assign('mista', $mista);

$mapa = $smarty->fetch('mapa-zongleri.tpl');
echo '<pre>'.htmlspecialchars($mapa).'</pre>';

$foo = fopen('../mapa/mapa-zongleri.kml', 'w');
fwrite($foo, $mapa);
fclose($foo);
