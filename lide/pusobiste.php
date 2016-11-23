<?php

$pusobiste = array();
$db = file('../mapa/mista.txt');
foreach ($db as $line) {
    $line = trim($line);
    $line = preg_split('/:/', $line);
    if (count($line) == 8) {
        if (strlen($line[4]) > 0) {
            $kraj = preg_split('/-/', $line[4]);
            $kraj = $kraj[1];
        } else {
            $kraj = '';
        }
        $pusobiste[$line[0]] = array('nazev' => $line[1], 'odkud' => $line[2], 'kde' => $line[3], 'kraj' => $kraj, 'stat' => $line[5], 'lat' => $line[6], 'lng' => $line[7]);
    }
}
