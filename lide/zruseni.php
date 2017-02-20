<?php

require '../init.php';
require '../func.php';

$smarty->assign('titulek', 'Zrušení účtu');
if (isset($_GET['m']) and isset($_GET['k'])) {
    $mail = $_GET['m'];
    $key = $_GET['k'];

    if (is_file(LIDE_TMP."/$mail/locked.key")) {
        $key_from_file = file(LIDE_TMP."/$mail/locked.key");
        $key_from_file = trim(array_pop($key_from_file));
    } else {
        $key_from_file = false;
    }

    if (is_file(LIDE_TMP."/$mail/locked.time")) {
        $time_from_file = file(LIDE_TMP."/$mail/locked.time");
        $time_from_file = trim(array_pop($time_from_file));
    } else {
        $time_from_file = false;
    }

    if ($key_from_file == $key and $time_from_file > (time() - TIMEOUT_REGISTRATION)) {
        $login = file(LIDE_TMP."/$mail/locked.login");
        $login = trim(array_pop($login));

        $user = LIDE_DATA."/$login";
        $tmp = LIDE_TMP."/$mail";

        if (is_dir($user)) {
            $foo = fopen($user.'/LOCKED', 'w');
            fclose($foo);

            $foo = fopen($user.'/zruseni.txt', 'w');
            fwrite($foo, time());
            fclose($foo);

            unlink($tmp.'/locked.key');
            rename($tmp.'/locked.time', $user.'/locked.time');
            unlink($tmp.'/locked.login');
            rmdir($tmp);

            session_destroy();
            unset($_SESSION['logged']);
            unset($_SESSION['ip']);
            unset($_SESSION['uzivatel']);
            setcookie('ZS', '', time() - (60 * 60 * 24), '/');
            $smarty->assign('chyby', array('Účet byl zrušen.'));
            $smarty->display('hlavicka.tpl');
            $smarty->display('alert.tpl');
            $smarty->display('paticka.tpl');
        } else {
            $smarty->assign('chyby', array('Účet neexistuje.'));
            $smarty->display('hlavicka.tpl');
            $smarty->display('alert.tpl');
            $smarty->display('paticka.tpl');
        }
    } else {
        $smarty->assign('chyby', array('Neplatný odkaz pro zrušení účtu.'));
        $smarty->display('hlavicka.tpl');
        $smarty->display('alert.tpl');
        $smarty->display('paticka.tpl');
    }
} else {
    $smarty->assign('chyby', array('Odkaz pro zrušení účtu není úplný.', 'Účet NEBYL zrušen.'));
    $smarty->display('hlavicka.tpl');
    $smarty->display('alert.tpl');
    $smarty->display('paticka.tpl');
}
