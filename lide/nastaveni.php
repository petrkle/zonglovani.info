<?php

require '../init.php';
require '../func.php';
require 'dovednosti.php';
require 'pusobiste.php';

$smarty->assign('stylwidth', IMG_CSS_WIDTH);

if (is_logged()) {
    $smarty->assign('titulek', 'Nastavení');
    $chyby = array();

    $trail = new Trail();
    $trail->addStep('Seznam žonglérů', LIDE_URL);
    $trail->addStep($_SESSION['uzivatel']['jmeno'], LIDE_URL.$_SESSION['uzivatel']['login'].'.html');
    $trail->addStep('Nastavení', LIDE_URL.'nastaveni/');

    if (isset($_GET['uprav'])) {
        $uprav = $_GET['uprav'];

        if ($uprav == 'jmeno') {
            if (isset($_POST['jmeno']) and isset($_POST['odeslat'])) {
                $jmeno = trim($_POST['jmeno']);

                if (strlen($jmeno) < 3) {
                    array_push($chyby, 'Jméno není zadané, nebo je příliš krátké. Minimální délka je tři znaky.');
                } elseif (strlen($jmeno) > 256) {
                    array_push($chyby, 'Jméno je příliš dlouhé.');
                } elseif (preg_match('/[-\*\.\?\!<>;\^\$\{\}\@%\&\(\)\'"_:´ˇ\\|#`~,]/', $jmeno)) {
                    array_push($chyby, 'Jméno obsahuje nepovolené znaky.');
                } elseif ($jmeno == $_SESSION['uzivatel']['jmeno']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/?result=nezmeneno');
                    exit();
                } else {
                    if (is_zs_jmeno($jmeno)) {
                        array_push($chyby, 'Zadané jméno už používá jiný uživatel.');
                    }
                }
                if (preg_match('/[A-ZĚŠČŘŽÝÁÍÉ]{4,}/', $jmeno)) {
                    array_push($chyby, 'Jméno obsahuje příliš mnoho VELKÝCH písmen.');
                }
                if (preg_match('/^[0-9]/', $jmeno)) {
                    array_push($chyby, 'Jméno nesmí začínat číslicí.');
                }
                if (preg_match('/[0-9]$/', $jmeno)) {
                    array_push($chyby, 'Jméno nesmí končit číslicí.');
                }
                if (preg_match('/(.)\\1{2,}/i', $jmeno)) {
                    array_push($chyby, 'Příliš mnoho opakujících se písmen v řaděěě za sebou.');
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/jmeno.txt', 'w');
                    fwrite($foo, $jmeno);
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_jmeno');
                    exit();
                }
            } else {
                $jmeno = $_SESSION['uzivatel']['jmeno'];
            }
            $smarty->assign('titulek', 'Zobrazované jméno');
            $trail->addStep('Zobrazované jméno');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->assign('jmeno', $jmeno);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-jmeno.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'soukromi') {
            if (isset($_POST['soukromi']) and isset($_POST['odeslat'])) {
                if ($_POST['soukromi'] == 'formular') {
                    $soukromi = 'formular';
                } else {
                    $soukromi = 'mail';
                }

                if ($soukromi == $_SESSION['uzivatel']['soukromi']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/?result=nezmeneno');
                    exit();
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/soukromi.txt', 'w');
                    fwrite($foo, $soukromi);
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok');
                    exit();
                }
            }
            $smarty->assign('titulek', 'Zobrazování e-mailu');
            $trail->addStep('Zobrazování e-mailu');
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-soukromi.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'foto') {
            if (isset($_FILES['foto']) and isset($_POST['odeslat'])) {
                if ($_FILES['foto']['size'] > (IMG_MAX_SIZE * 1024 * 1024)) {
                    array_push($chyby, 'Obrázek je příliš velký. Maximální velikost '.IMG_MAX_SIZE.'MB.');
                }
                $obrazekinfo = getimagesize($_FILES['foto']['tmp_name']);
                if (is_array($obrazekinfo)) {
                    if ($obrazekinfo[0] > IMG_MAX_WIDTH or $obrazekinfo[1] > IMG_MAX_HEIGHT) {
                        array_push($chyby, 'Rozměry obrázku jsou příliš velké. Maximální velikost '.IMG_MAX_WIDTH.'x'.IMG_MAX_HEIGHT.'px.');
                    }
                    if ($obrazekinfo['mime'] != 'image/jpeg') {
                        array_push($chyby, 'Špatný formát souboru. Přidávat jde pouze obrázky formátu JPG.');
                    }
                } else {
                    if ($_FILES['foto']['error'] == '0') {
                        array_push($chyby, 'Odeslaný soubor není obrázek.');
                    } elseif ($_FILES['foto']['error'] == '4') {
                        array_push($chyby, 'Nebyl odeslán žádný soubor.');
                    } else {
                        array_push($chyby, 'Chyba při nahrávání obrázku.');
                    }
                }
                if (count($chyby) == 0) {
                    move_uploaded_file($_FILES['foto']['tmp_name'], LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
                    if ($obrazekinfo[0] > IMG_RESIZE_WIDTH or $obrazekinfo[1] > IMG_RESIZE_HEIGHT) {
                        // zmenšení velkých obrázků
                        include $_SERVER['DOCUMENT_ROOT'].'/lib/SimpleImage.php';
                        $image = new SimpleImage();
                        $image->load(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
                        $image->resizeToMax(IMG_RESIZE_WIDTH, IMG_RESIZE_HEIGHT);
                        $image->save(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/resized-foto.jpg');
                        rename(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/resized-foto.jpg', LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
                    }
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    header('Location: '.LIDE_URL.'nastaveni/?result=uploaded');
                    exit();
                }
            }
            if (isset($_POST['smazat']) and is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg')) {
                unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/foto.jpg');
                $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                header('Location: '.LIDE_URL.'nastaveni/?result=deleted');
                exit();
            }

            $smarty->assign('titulek', 'Fotografie');
            $trail->addStep('Fotografie');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-foto.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'web') {
            if (isset($_POST['web']) and isset($_POST['odeslat'])) {
                $web = $_POST['web'];

                if (strlen($web) > 0 and !preg_match('/^http/', $web)) {
                    $web = 'http://'.$web;
                }

                if (strlen($web) > 1024) {
                    array_push($chyby, 'Adresa je příliš dlouhá.');
                }

                if (strlen($web) > 0 and preg_match('/ /', $web)) {
                    array_push($chyby, 'Adresa nesmí obsahovat mezery.');
                    array_push($chyby, 'Nastavit lze jen jednu adresu.');
                }

                if (strlen($web) > 0 and !filter_var($web, FILTER_VALIDATE_URL)) {
                    array_push($chyby, 'Špatný formát adresy.');
                }

                if ($web == $_SESSION['uzivatel']['web']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/?result=nezmeneno');
                    exit();
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/web.txt', 'w');
                    fwrite($foo, $web);
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    if (strlen($web) == 0 and is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/web.txt')) {
                        unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/web.txt');
                        header('Location: '.LIDE_URL.'nastaveni/?result=ok_web_del');
                        exit();
                    }
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_web');
                    exit();
                }
            } else {
                if (isset($_SESSION['uzivatel']['web'])) {
                    $web = $_SESSION['uzivatel']['web'];
                } else {
                    $web = '';
                }
            }
            $trail->addStep('Internetová stránka');
            $smarty->assign('titulek', 'Internetová stránka');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('web', $web);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-web.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'tel') {
            if (isset($_POST['tel']) and isset($_POST['odeslat'])) {
                $tel = $_POST['tel'];
                if (strlen($tel) > 0 and !preg_match('/^\+42[01] [0-9]{3} [0-9]{3} [0-9]{3}$/', $tel)) {
                    array_push($chyby, 'Špatný formát telefonního čísla. Číslo zadej ve formátu "+420&nbsp;aaa&nbsp;bbb&nbsp;ccc" nebo "+421&nbsp;aaa&nbsp;bbb&nbsp;ccc".');
                }

                if ($tel == $_SESSION['uzivatel']['tel']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/?result=nezmeneno');
                    exit();
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/tel.txt', 'w');
                    fwrite($foo, $tel);
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    if (strlen($tel) == 0 and is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/tel.txt')) {
                        unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/tel.txt');
                        header('Location: '.LIDE_URL.'nastaveni/?result=ok_tel_del');
                        exit();
                    }
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_tel');
                    exit();
                }
            } else {
                if (isset($_SESSION['uzivatel']['tel'])) {
                    $tel = $_SESSION['uzivatel']['tel'];
                } else {
                    $tel = '';
                }
            }
            $trail->addStep('Telefonní číslo');
            $smarty->assign('titulek', 'Telefonní číslo');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('tel', $tel);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-tel.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'dovednosti') {
            if (isset($_POST['odeslat'])) {
                $pocet = 0;
                $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/dovednosti.txt', 'w');
                foreach ($dovednosti as $nazev => $obsah) {
                    if (isset($_POST[$nazev])) {
                        $bar = $_POST[$nazev];
                        if (in_array($bar, $dovednosti[$nazev]['hodnoty']) and $bar != 'n') {
                            fwrite($foo, "$nazev:$bar\n");
                            ++$pocet;
                        }
                    }
                }
                fclose($foo);
                if ($pocet == 0) {
                    unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/dovednosti.txt');
                }
                $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                header('Location: '.LIDE_URL.'nastaveni/?result=ok');
                exit();
            }

            foreach ($dovednosti as $nazev => $obsah) {
                if (isset($_SESSION['uzivatel']['dovednosti'][$nazev])) {
                    $dovednosti[$nazev]['stav'] = $_SESSION['uzivatel']['dovednosti'][$nazev];
                } else {
                    $dovednosti[$nazev]['stav'] = 'n';
                }
            }

            $smarty->assign('titulek', 'Žonglérské dovednosti');
            $trail->addStep('Dovednosti');
            $smarty->assign('dovednosti', $dovednosti);
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-dovednosti.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'pusobiste') {
            if (isset($_POST['odeslat'])) {
                if (count($_POST['misto']) > 6) {
                    array_push($chyby, 'Jako působiště můžeš vybrat nejvíc 6 míst.');
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/pusobiste.txt', 'w');
                    if (is_array($_POST['misto'])) {
                        foreach ($_POST['misto'] as $nazev) {
                            if (isset($pusobiste[$nazev])) {
                                fwrite($foo, "$nazev\n");
                            }
                        }
                    }
                    fclose($foo);
                    if (count($_POST['misto']) == 0) {
                        unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/pusobiste.txt');
                    }
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok');
                    exit();
                }
            }

            foreach ($pusobiste as $nazev => $obsah) {
                if (is_array($_SESSION['uzivatel']['pusobiste']) and in_array($nazev, $_SESSION['uzivatel']['pusobiste'])) {
                    $pusobiste[$nazev]['stav'] = 'y';
                } else {
                    $pusobiste[$nazev]['stav'] = 'n';
                }
            }

            $smarty->assign('titulek', 'Místo(a), kde žongluješ');
            $trail->addStep('Působiště');
            $smarty->assign('pusobiste', get_large_places($pusobiste));
            $smarty->assign('pusobiste_cz', get_places('CZ', $pusobiste));
            $smarty->assign('pusobiste_sk', get_places('SK', $pusobiste));
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-pusobiste.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'znameni') {
            require_once '../horoskop/horoskop-data.php';

            if (isset($_POST['odeslat']) and isset($_POST['znameni'])) {
                $zn = $_POST['znameni'];
                if (!isset($zverokruh[$zn])) {
                    $zn = 'n';
                }
                if ($zn == 'n') {
                    if (is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/znameni.txt')) {
                        unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/znameni.txt');
                    }
                } else {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/znameni.txt', 'w');
                    fwrite($foo, $zn);
                    fclose($foo);
                }

                $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                header('Location: '.LIDE_URL.'nastaveni/?result=ok');
                exit();
            }

            if (isset($_SESSION['uzivatel']['znameni'])) {
                $znameni = $_SESSION['uzivatel']['znameni'];
            } else {
                $znameni = 'n';
            }

            $trail->addStep('Znamení');
            $smarty->assign('znameni', $znameni);
            $smarty->assign('zverokruh', $zverokruh);
            $smarty->assign('titulek', 'Znamení zvěrokruhu');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-znameni.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'zruseni') {
            if (isset($_POST['nechat'])) {
                header('Location: '.LIDE_URL.'nastaveni/');
                exit();
            }

            if (isset($_POST['zrusit'])) {
                $tmp = LIDE_TMP.'/'.$_SESSION['uzivatel']['email'];
                $key = abs(crc32($_SESSION['uzivatel']['email'].time().$_SESSION['uzivatel']['login']));
                if (!is_dir($tmp)) {
                    mkdir($tmp);
                }

                $foo = fopen($tmp.'/locked.key', 'w');
                fwrite($foo, $key);
                fclose($foo);

                $foo = fopen($tmp.'/locked.time', 'w');
                fwrite($foo, time());
                fclose($foo);

                $foo = fopen($tmp.'/locked.login', 'w');
                fwrite($foo, $_SESSION['uzivatel']['login']);
                fclose($foo);

                $subject = 'Zrušení účtu';

                $splmail = preg_split('/@/', $_SESSION['uzivatel']['email']);

                $smarty->assign('subject', $subject);
                $smarty->assign('splmail', $splmail);
                $smarty->assign('key', $key);

                $vysledek = sendmail(array(
            'to' => $_SESSION['uzivatel']['email'],
            'subject' => $subject,
            'text' => $smarty->fetch('mail/lide-ucet-zruseni.txt.tpl'),
            'html' => $smarty->fetch('mail/lide-ucet-zruseni.html.tpl'),
            'img' => array('../img/5/5micku.png'),
        ));

                if ($vysledek) {
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_zruseni');
                } else {
                    header('Location: '.LIDE_URL.'nastaveni/?result=ko');
                }
            }

            $smarty->assign('titulek', 'Zrušení účtu');
            $trail->addStep('Zrušení účtu');
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-zruseni.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'mail') {
            $chyby = array();

            if (isset($_POST['odeslat'])) {
                if (isset($_POST['email'])) {
                    $email = strtolower(trim($_POST['email']));
                } else {
                    $email = '';
                }

                if (isset($_POST['heslo'])) {
                    $heslo = trim($_POST['heslo']);
                } else {
                    $heslo = '';
                }

                if (isset($_POST['antispam'])) {
                    $odpoved = strtolower(trim($_POST['antispam']));
                } else {
                    $odpoved = '';
                }

                if (!password_verify($heslo, $_SESSION['uzivatel']['passwd_crypt'])) {
                    array_push($chyby, 'Špatné heslo.');
                }

                if ($odpoved != $_SESSION['antispam_odpoved']) {
                    array_push($chyby, 'Špatná odpověď na kontrolní otázku.');
                    $antispam = get_antispam();
                    $smarty->assign('jscachebuster', uniqid());
                    $_SESSION['antispam_otazka'] = $antispam[0];
                    $_SESSION['antispam_odpoved'] = $antispam[1];
                    $smarty->assign('antispam_otazka', $_SESSION['antispam_otazka']);
                }

                if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i', $email)) {
                    array_push($chyby, 'Neplatný e-mail.');
                } else {
                    if (is_zs_email($email)) {
                        array_push($chyby, 'Tento e-mail už používá jiný uživatel žonglérova slabikáře.');
                    }
                }

                if ($email == $_SESSION['uzivatel']['email']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/');
                    exit();
                }

                if (count($chyby) == 0) {
                    $tmp = LIDE_TMP.'/'.$email;
                    $key = abs(crc32($_SESSION['uzivatel']['email'].time().$_SESSION['uzivatel']['login']));
                    if (!is_dir($tmp)) {
                        mkdir($tmp);
                    }

                    $foo = fopen($tmp.'/change.key', 'w');
                    fwrite($foo, $key);
                    fclose($foo);

                    $foo = fopen($tmp.'/change.time', 'w');
                    fwrite($foo, time());
                    fclose($foo);

                    $foo = fopen($tmp.'/login.txt', 'w');
                    fwrite($foo, $_SESSION['uzivatel']['login']);
                    fclose($foo);

                    $foo = fopen($tmp.'/oldmail.txt', 'w');
                    fwrite($foo, $_SESSION['uzivatel']['email']);
                    fclose($foo);

                    $subject = 'Změna emailu';
                    $splmail = preg_split('/@/', $email);

                    $smarty->assign('subject', $subject);
                    $smarty->assign('splmail', $splmail);
                    $smarty->assign('key', $key);

                    $vysledek = sendmail(array(
            'to' => $email,
            'subject' => $subject,
            'text' => $smarty->fetch('mail/lide-zmena-emailu.txt.tpl'),
            'html' => $smarty->fetch('mail/lide-zmena-emailu.html.tpl'),
            'img' => array('../img/5/5micku.png'),
        ));

                    if ($vysledek) {
                        header('Location: '.LIDE_URL.'nastaveni/?result=ok_mailchange');
                    } else {
                        header('Location: '.LIDE_URL.'nastaveni/?result=ko');
                    }
                } else {
                    $smarty->assign('chyby', $chyby);
                }
            }

            $antispam = get_antispam();
            $smarty->assign('jscachebuster', uniqid());
            $_SESSION['antispam_otazka'] = $antispam[0];
            $_SESSION['antispam_odpoved'] = $antispam[1];
            $smarty->assign('antispam_otazka', $_SESSION['antispam_otazka']);
            $smarty->assign('antispam_odpoved', $_SESSION['antispam_odpoved']);
            $trail->addStep('E-mail');
            $smarty->assign('titulek', 'Změna adresy elektronické pošty');
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-mail.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'vzkaz') {
            if (isset($_POST['vzkaz']) and isset($_POST['odeslat'])) {
                $vzkaz = $_POST['vzkaz'];

                if (podil_velkych_pismen($vzkaz) > MAX_BIG_LETTERS) {
                    array_push($chyby, 'Podíl VELKÝCH písmen ve vzkazu je větší než '.(MAX_BIG_LETTERS * 100).'%.');
                    array_push($chyby, 'Zkontroluj, jestli není zaseklá klávesa Shift nebo Caps Lock.');
                }

                if (strlen($vzkaz) > 1024) {
                    array_push($chyby, 'Vzkaz je příliš dlouhý. Maximální délka je 1024 znaků.');
                }

                if ($vzkaz == $_SESSION['uzivatel']['vzkaz']) {
                    // nic :^)
                    header('Location: '.LIDE_URL.'nastaveni/?result=nezmeneno');
                    exit();
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/vzkaz.txt', 'w');
                    fwrite($foo, $vzkaz);
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    if (strlen($vzkaz) == 0 and is_file(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/vzkaz.txt')) {
                        unlink(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/vzkaz.txt');
                        header('Location: '.LIDE_URL.'nastaveni/?result=ok_vzkaz_del');
                        exit();
                    }
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_vzkaz');
                    exit();
                }
            }
            $trail->addStep('Vzkaz');
            $smarty->assign('titulek', 'Nastavení vzkazu');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-vzkaz.tpl');
            $smarty->display('paticka.tpl');
        } elseif ($uprav == 'heslo') {
            if (isset($_POST['stareheslo']) and isset($_POST['heslo']) and isset($_POST['heslo2']) and isset($_POST['odeslat'])) {
                $stareheslo = $_POST['stareheslo'];
                $heslo = $_POST['heslo'];
                $heslo2 = $_POST['heslo2'];

                if (strlen($heslo) < PASS_MIN_LENGHT) {
                    array_push($chyby, 'Heslo není zadané, nebo je příliš krátké. Minimální délka hesla je '.PASS_MIN_LENGHT.' znaků.');
                }

                if (
                        preg_match('/.*'.$_SESSION['uzivatel']['login'].'.*/i', $heslo) or
                        preg_match('/.*'.$_SESSION['uzivatel']['jmeno'].'.*/i', $heslo) or
                        preg_match('/.*'.$_SESSION['uzivatel']['email'].'.*/i', $heslo)) {
                    array_push($chyby, 'Zadané heslo je příliš slabé.');
                }

                if ($heslo != $heslo2) {
                    array_push($chyby, 'Nově zadaná hesla se neshodují.');
                }

                if (!password_verify($stareheslo, $_SESSION['uzivatel']['passwd_crypt'])) {
                    array_push($chyby, 'Špatně zadané aktuální heslo.');
                }

                if (count($chyby) == 0) {
                    $foo = fopen(LIDE_DATA.'/'.$_SESSION['uzivatel']['login'].'/passwd.crypt', 'w');
                    fwrite($foo, password_hash($heslo, PASSWORD_BCRYPT));
                    fclose($foo);
                    $_SESSION['uzivatel'] = get_user_complete($_SESSION['uzivatel']['login']);
                    header('Location: '.LIDE_URL.'nastaveni/?result=ok_heslo');
                    exit();
                }
            }
            $smarty->assign('titulek', 'Heslo');
            $trail->addStep('Heslo');
            $smarty->assign('chyby', $chyby);
            $smarty->assign('trail', $trail->path);
            $smarty->display('hlavicka.tpl');
            $smarty->display('nastaveni-heslo.tpl');
            $smarty->display('paticka.tpl');
        } else {
            header('Location: '.LIDE_URL.'nastaveni/');
            exit();
        }
    } else {
        if (isset($_GET['result'])) {
            $result = $_GET['result'];
            require_once 'nastaveni.hlasky.php';
            if (isset($nastaveni_hlasky[$result])) {
                array_push($chyby, $nastaveni_hlasky[$result]);
            } else {
                array_push($chyby, 'Došlo k chybě.');
            }
            $smarty->assign('chyby', $chyby);
        }
        if (isset($_SESSION['uzivatel']['web']) and strlen($_SESSION['uzivatel']['web']) > 0) {
            $smarty->assign('web', true);
        }

        if ((isset($_SESSION['uzivatel']['dovednosti']['show']) or
            isset($_SESSION['uzivatel']['dovednosti']['workshop']) or
            isset($_SESSION['uzivatel']['dovednosti']['manufactory']) or
            isset($_SESSION['uzivatel']['dovednosti']['shop'])) and $_SESSION['uzivatel']['pusobiste'] == false
        ) {
            $proc = array();
            if (isset($_SESSION['uzivatel']['dovednosti']['show'])) {
                $proc['show'] = $dovednosti['show'];
            }
            if (isset($_SESSION['uzivatel']['dovednosti']['workshop'])) {
                $proc['workshop'] = $dovednosti['workshop'];
            }
            if (isset($_SESSION['uzivatel']['dovednosti']['manufactory'])) {
                $proc['manufactory'] = $dovednosti['manufactory'];
            }
            if (isset($_SESSION['uzivatel']['dovednosti']['shop'])) {
                $proc['shop'] = $dovednosti['shop'];
            }
            $smarty->assign('misto', true);
            $smarty->assign('proc', $proc);
        }

        $smarty->assign('trail', $trail->path);
        $smarty->display('hlavicka.tpl');
        $smarty->display('nastaveni.tpl');
        $smarty->display('paticka.tpl');
    }
} else {
    if (isset($_GET['uprav'])) {
        $uprav = $_GET['uprav'];
    } else {
        $uprav = '';
    }
    header('Location: '.LIDE_URL.'prihlaseni.php?next='.LIDE_URL.'nastaveni/'.$uprav.'&notice');
    exit();
}
