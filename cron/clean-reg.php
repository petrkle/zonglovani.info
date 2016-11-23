<?php

require '../init.php';

if (is_dir(LIDE_TMP) and opendir(LIDE_TMP)) {
    $navrat = array();
    $adr = opendir(LIDE_TMP);
    while (false !== ($dir = readdir($adr))) {
        if (is_dir(LIDE_TMP.'/'.$dir) and !preg_match('/^\./', $dir)) {
            $now = time();
            $stari = filemtime(LIDE_TMP.'/'.$dir);
            if (($now - $stari) > (2 * 24 * 3600)) {
                $files = opendir(LIDE_TMP.'/'.$dir);
                while (false !== ($file = readdir($files))) {
                    if (is_file(LIDE_TMP.'/'.$dir.'/'.$file)) {
                        unlink(LIDE_TMP.'/'.$dir.'/'.$file);
                    }
                }
                rmdir(LIDE_TMP.'/'.$dir);
            }
        }
    }
}
closedir($adr);
