<?php

if (php_sapi_name() != 'cli') {
    echo 'Run from command line';
    exit();
}

chdir(dirname(__FILE__));

require '../init.php';
require '../func.php';

$loginy = get_loginy();
$now = time();

define('SENDMAIL_DATA', ZS_DIR.'/data/sendmails');

foreach ($loginy as $login) {
    if (is_file(LIDE_DATA.'/'.$login.'/prihlaseni.txt')) {
        $lastlogin = filemtime(LIDE_DATA.'/'.$login.'/prihlaseni.txt');
    } else {
        $lastlogin = filemtime(LIDE_DATA.'/'.$login);
    }

    $info = get_user_props($login);

    if (($now - $lastlogin) > (365 * 24 * 3600)) {
        // zablokovat ucet
        if (is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')) {
            unlink(SENDMAIL_DATA.'/'.$info['email'].'.spici');
        }
        $foo = fopen(LIDE_DATA.'/'.$login.'/LOCKED', 'w');
        fwrite($foo, time());
        fclose($foo);
    } elseif (($now - $lastlogin) > (335 * 24 * 3600)) {
        // poslat varovny mail
        if (!is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')) {
            $subject = 'Účet v žonglérově slabikáři';
            $smarty->assign('user', $info);
            $smarty->assign('subject', $subject);
            $vysledek = sendmail(array(
            'to' => $info['email'],
            'subject' => $subject,
            'text' => $smarty->fetch('mail/cron-old-accounts.txt.tpl'),
            'html' => $smarty->fetch('mail/cron-old-accounts.html.tpl'),
            'img' => array('../img/5/5micku.png'),
        ));

            if ($vysledek) {
                // zapsat soubor
                $foo = fopen(SENDMAIL_DATA.'/'.$info['email'].'.spici', 'w');
                fwrite($foo, time());
                fclose($foo);
            }
        }
    } else {
        // obnoveny ucet
        if (is_file(SENDMAIL_DATA.'/'.$info['email'].'.spici')) {
            unlink(SENDMAIL_DATA.'/'.$info['email'].'.spici');
        }
    }
}
