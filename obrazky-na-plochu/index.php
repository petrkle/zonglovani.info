<?php

require '../init.php';
require '../func.php';

$wallpapers = get_wallpapers();

$titulek = 'Obrázky na plochu';
$trail = new Trail();
$trail->addStep($titulek, WALLPAPERS_URL);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($wallpapers[$id])) {
        $titulek = $wallpapers[$id]['titulek'];
        $trail->addStep($titulek);
        $smarty->assign('titulek', $titulek);
        $smarty->assign('feedback', true);
        $smarty->assign('fbsdileni', 'obrázek');
        $smarty->assign('DIRECT_LINK_TO_IMAGE', true);
        $smarty->assign('nahled', $wallpapers[$id]['nahled_url']);
        $smarty->assign('keywords', 'obrázky, žonglování, wallpaper, pozadí na plochu, '.$titulek);
        $smarty->assign('description', 'Tapety na plochu počítače - '.$titulek);

        $smarty->assign('trail', $trail->path);
        $smarty->assign('obrazek', $wallpapers[$id]);
        $smarty->display('hlavicka.tpl');
        $smarty->display('obrazek-na-plochu.tpl');
        $smarty->display('paticka.tpl');
    } else {
        require '../404.php';
    }
    exit();
}

$smarty->assign('trail', $trail->path);

$smarty->assign('keywords', 'obrázky, žonglování, wallpaper, pozadí na plochu');
$smarty->assign('description', 'Tapety na plochu počítače s žonglérskou tématikou.');

$smarty->assign('feedback', true);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/obrazky-na-plochu/nahledy/pes-a-micek.jpg');

$dalsi = array(
    array('url' => '/obrazky/', 'text' => 'Obrázky žonglování', 'title' => 'Obrázky žonglérů a žonglérek'),
    );
$smarty->assign('dalsi', $dalsi);

$smarty->assign('titulek', $titulek);
$smarty->assign('wallpapers', $wallpapers);
$smarty->display('hlavicka.tpl');
$smarty->display('obrazky-na-plochu.tpl');
$smarty->display('paticka.tpl');

function get_wallpapers()
{
    $dir = opendir(WALLPAPERS_DATA.'/nahledy');
    $navrat = array();
    if ($dir) {
        while (($filename = readdir($dir)) !== false) {
            if (preg_match('/.+\.(jpg|png)$/', $filename)) {
                $foo = array();
                $pripona = preg_split('/\./', $filename);
                $pripona = array_pop($pripona);
                $foo['nahled_url'] = 'https://'.$_SERVER['SERVER_NAME'].WALLPAPERS_URL.'nahledy/'.$filename;
                $size = getimagesize(WALLPAPERS_DATA.'/nahledy/'.$filename);
                $foo['nahled_sirka'] = $size[0];
                $foo['nahled_vyska'] = $size[1];
                $foo['soubor'] = $filename;
                $foo['basename'] = basename($filename, '.'.$pripona);
                if (is_readable('info/'.$foo['basename'].'.xml')) {
                    $xml = simplexml_load_file('info/'.$foo['basename'].'.xml');
                    $foo['titulek'] = (string) $xml->titulek;
                    $foo['popisek'] = (string) $xml->popisek;
                }
                $navrat[$foo['basename']] = $foo;
            }
        }
    }
    closedir($dir);
    ksort($navrat);

    return $navrat;
}
