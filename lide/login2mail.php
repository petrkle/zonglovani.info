<?php

require '../init.php';
require '../func.php';

echo '<pre>';

$loginy = array();

    $dir = opendir(LIDE_DATA);
    $navrat = array();
        if ($dir) {
            while (($filename = readdir($dir)) !== false) {
                if (!preg_match('/^\./', $filename) and is_dir(LIDE_DATA.'/'.$filename) and !is_file(LIDE_DATA.'/'.$filename.'/REVOKED')) {
                    array_push($loginy, $filename);
                }
            }
        }
    closedir($dir);

if (!is_dir(LIDE_BY_MAIL)) {
    mkdir(LIDE_BY_MAIL);
}

foreach ($loginy as $login) {
    $clovek = get_user_props($login);
    $fl = preg_replace('/^(.).*/', '\1', $clovek['email']);
    $parts = preg_split('/@/', $clovek['email']);
    $name = $parts[0];
    $domain = $parts[1];

    if (!is_dir(LIDE_BY_MAIL."/$domain")) {
        mkdir(LIDE_BY_MAIL."/$domain");
    }

    if (!is_dir(LIDE_BY_MAIL."/$domain/$fl")) {
        mkdir(LIDE_BY_MAIL."/$domain/$fl");
    }

    if (!is_dir(LIDE_BY_MAIL."/$domain/$fl/$name")) {
        mkdir(LIDE_BY_MAIL."/$domain/$fl/$name");
    }

    $foo = fopen(LIDE_BY_MAIL."/$domain/$fl/$name/login", 'w');
    fwrite($foo, $login);
    fclose($foo);
    var_dump($clovek['login']);
}
