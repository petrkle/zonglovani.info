<?php

require '../../init.php';
require '../../func.php';
require 'rozhovory.php';

$titulek = 'Rozhovory';
$trail = new Trail();
$trail->addStep($titulek, LIDE_URL.'rozhovor');
$smarty->assign('feedback', true);

if (!isset($_GET['id'])) {
    $smarty->assign('nadpis', $titulek);
    $smarty->assign('keywords', 'žonglování, skupina, rozhovor');
    $smarty->assign('description', 'Rozhovory se žongléry');

    $smarty->assign('trail', $trail->path);
    $smarty->assign('rozhovory', $rozhovory);
    $smarty->assign('titulek', $titulek);
    $smarty->display('hlavicka.tpl');
    $smarty->display('rozhovory-index.tpl');
    $smarty->display('paticka.tpl');
} else {
    $id = $_GET['id'];
    if (!isset($rozhovory[$id])) {
        http_response_code(404);
        exit();
    }
    $rozhovor = nacti_rozhovor($id);

    $titulek = 'Rozhovor s '.$rozhovor['about']['nazev'];
    $smarty->assign('nadpis', $titulek);
    $smarty->assign('keywords', 'žonglování, '.$rozhovor['about']['nazev'].', skupina, rozhovor');
    $smarty->assign('description', 'Rozhovor s žonglérskou skupinou');

    $smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/'.preg_replace('/^(.).*/', '\1', $rozhovor['about']['img']).'/'.$rozhovor['about']['img']);

    $trail->addStep($rozhovor['about']['nazev']);

    $smarty->assign('trail', $trail->path);
    $smarty->assign('rozhovor', $rozhovor);
    $smarty->assign('titulek', $titulek);
    $smarty->display('hlavicka.tpl');
    $smarty->display('rozhovor.tpl');
    $smarty->display('paticka.tpl');
}

function nacti_rozhovor($soubor)
{
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/xml/rozhovor-'.basename($soubor).'.xml');
    $rozhovor = array();
    $rozhovor['otazky'] = array();
    $rozhovor['about'] = (array) $xml->about;
    $rozhovor['pre'] = (array) $xml->pre;

    foreach ($xml->otazka as $otazka) {
        $foo = array();
        $foo['otazka'] = (string) $otazka['text'];
        $foo['odpovedi'] = array();
        foreach ($otazka->odpoved as $odpoved) {
            $odpoved = array('jmeno' => (string) $odpoved['jmeno'], 'text' => (string) $odpoved);
            if (strlen($odpoved['text']) > 0) {
                array_push($foo['odpovedi'], $odpoved);
            }
        }
        array_push($rozhovor['otazky'], $foo);
    }

    if (isset($xml->dalsi)) {
        $rozhovor['dalsi'] = array();
        foreach ($xml->dalsi->link as $odkaz) {
            if (isset($odkaz['url'])) {
                $url = (string) $odkaz['url'];
                $text = (string) $odkaz;
                $rozhovor['dalsi'][$url]['text'] = $text;
                if (isset($odkaz['title'])) {
                    $rozhovor['dalsi'][$url]['title'] = (string) $odkaz['title'];
                }
            }
        }
    }

    return $rozhovor;
}
