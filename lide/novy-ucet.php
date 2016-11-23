<?php

require '../init.php';
require '../func.php';

if (!isset($_SESSION)) {
    session_name('ZS');
    session_start();
}

$titulek = 'Založit účet';
$smarty->assign('titulek', $titulek);
$smarty->assign('description', 'Založení nového účtu v žonglérově slabikáři. Zviditelni se v žonglérském světě.');

$trail = new Trail();
$trail->addStep('Seznam žonglérů', LIDE_URL);
$trail->addStep($titulek);

if (isset($_SESSION['logged']) and $_SESSION['logged'] == true) {
    header('Location: '.LIDE_URL.'nastaveni/');
    exit();
}

if (isset($_GET['action'])) {
    $chyby = array();

    if (isset($_POST['jmeno'])) {
        $jmeno = trim($_POST['jmeno']);
        $smarty->assign('jmeno', $jmeno);
        $_SESSION['reg_jmeno'] = $jmeno;
    } elseif (isset($_SESSION['reg_jmeno'])) {
        $jmeno = $_SESSION['reg_jmeno'];
        $smarty->assign('jmeno', $jmeno);
    } else {
        $jmeno = '';
    }

    if (isset($_POST['email'])) {
        $email = strtolower(trim($_POST['email']));
        $smarty->assign('email', $email);
        $_SESSION['reg_email'] = $email;
    } elseif (isset($_SESSION['reg_email'])) {
        $email = $_SESSION['reg_email'];
        $smarty->assign('email', $email);
    } else {
        $email = '';
    }

    if (strlen($jmeno) < 3) {
        array_push($chyby, 'Jméno není zadané, nebo je příliš krátké.');
    } elseif (podil_velkych_pismen($jmeno) > MAX_BIG_LETTERS) {
        array_push($chyby, 'Podíl VELKÝCH písmen ve jméně je větší než '.(MAX_BIG_LETTERS * 100).'%.');
        array_push($chyby, 'Zkontroluj, jestli není zaseklá klávesa Shift nebo Caps Lock.');
    } elseif (preg_match('/(.)\\1{2,}/i', $jmeno)) {
        array_push($chyby, 'Příliš mnoho opakujících se písmen v řaděěě za sebou.');
    } elseif (preg_match('/^[0-9]/', $jmeno)) {
        array_push($chyby, 'Jméno nesmí začínat číslicí.');
    } elseif (preg_match('/[0-9]$/', $jmeno)) {
        array_push($chyby, 'Jméno nesmí končit číslicí.');
    } elseif (strlen($jmeno) > 40) {
        array_push($chyby, 'Jméno je příliš dlouhé.');
    } elseif (preg_match('/[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)\'\"_:´ˇ\\|#`~,]/i', $jmeno)) {
        array_push($chyby, 'Jméno obsahuje nepovolené znaky.');
    } else {
        if (is_zs_jmeno($jmeno)) {
            array_push($chyby, 'Zadané jméno už používá jiný uživatel.');
        }
    }

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)) {
        array_push($chyby, 'Neplatný e-mail.');
    } else {
        if (is_zs_email($email)) {
            $login = email2login($email);
            $uzivatel = get_user_props($login);

            if ($uzivatel['status'] == 'locked') {
                array_push($chyby, 'Účet s tímto e-mailem byl smazán, protože nebyl dlouho používán. <a href="zapomenute-heslo.php" title="Zaslat nové heslo emailem.">Poslat&nbsp;nové&nbsp;heslo</a>.');
            } elseif ($uzivatel['status'] == 'revoked') {
                array_push($chyby, 'Účet s tímto e-mailem už je zablokován, <a href="/kontakt.html" title="Kontakt">kontaktujte administrátora</a>.');
            } else {
                array_push($chyby, 'Účet s tímto e-mailem už byl vytvořen. <a href="zapomenute-heslo.php" title="Zaslat zapomenuté heslo emailem.">Zapomenuté&nbsp;heslo</a>?');
            }
        }
    }

    if (isset($_POST['antispam'])) {
        $odpoved = strtolower(trim($_POST['antispam']));
    } else {
        $odpoved = '';
    }

    if ($odpoved != $_SESSION['antispam_odpoved']) {
        array_push($chyby, 'Špatná odpověď na kontrolní otázku.');
        $antispam = get_antispam();
        $_SESSION['antispam_otazka'] = $antispam[0];
        $_SESSION['antispam_odpoved'] = $antispam[1];
        $smarty->assign('antispam_otazka', $_SESSION['antispam_otazka']);
    }

    if (count($chyby) == 0) {
        header('Location: '.LIDE_URL.'add.php');
    } else {
        $antispam = get_antispam();
        $_SESSION['antispam_otazka'] = $antispam[0];
        $_SESSION['antispam_odpoved'] = $antispam[1];
        $smarty->assign('antispam_otazka', $_SESSION['antispam_otazka']);
        $smarty->assign('antispam_odpoved', $_SESSION['antispam_odpoved']);
        $smarty->assign('trail', $trail->path);
        $smarty->assign('chyby', $chyby);
        $smarty->assign('jscachebuster', uniqid());
        $smarty->display('hlavicka.tpl');
        $smarty->display('novy-ucet.tpl');
        $smarty->display('paticka.tpl');
    }
} else {
    $antispam = get_antispam();
    $_SESSION['antispam_otazka'] = $antispam[0];
    $_SESSION['antispam_odpoved'] = $antispam[1];
    $smarty->assign('antispam_otazka', $_SESSION['antispam_otazka']);
    $smarty->assign('antispam_odpoved', $_SESSION['antispam_odpoved']);

    $dalsi = array(
        array('url' => '/exkurze.html', 'text' => 'Náhled do žonglérova slabikáře', 'title' => 'Možnožnosti nastavení v žonglérově slabikáři'),
        array('url' => LIDE_URL, 'text' => 'Seznam žongléřů', 'title' => 'Seznam uživatelů žonglérova slabikáře'),
        );
    $smarty->assign('dalsi', $dalsi);

    $smarty->assign('jscachebuster', uniqid());
    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('novy-ucet.tpl');
    $smarty->display('paticka.tpl');
}
