<?php

require '../init.php';
require '../func.php';

$titulek = 'Soubory ke stažení';
$smarty->assign('titulek', $titulek);
$smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/d/downloada.png');
$smarty->assign('description', 'Soubory ke stažení - žonglování.');
$smarty->assign('feedback', true);

$trail = new Trail();
$trail->addStep($titulek, '/download/');
$downloads = get_downloads();
$smarty->assign('downloads', $downloads);
$smarty->assign('poradi', array('pdf', 'mobi', 'epub', 'exe', 'msi', 'tar.bz2', 'apk', 'wordpress', 'vizitky'));
$smarty->assign('hidden', array('apk' => true));

if (isset($_GET['id'])) {
    if (isset($downloads[$_GET['id']])) {
        $id = $_GET['id'];

        if ($id == 'pdf') {
            $dalsi = array(
            array('url' => '/isbn.html', 'text' => 'ISBN žonglérova slabikáře', 'title' => 'ISBN 978-80-260-6534-0'),
            array('url' => '/download/mobi.html', 'text' => 'Žonglérův slabikář pro Amazon Kindle', 'title' => 'Žonglérův slabikář ve formátu mobi.'),
            array('url' => '/literatura.html', 'text' => 'Literatura o žonglování', 'title' => 'Další knížky o žonglování'),
            );
        }

        if ($id == 'mobi') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            array('url' => '/download/epub.html', 'text' => 'Žonglérův slabikář - epub', 'title' => 'Žonglérův slabikář ve formátu epub.'),
            );
        }

        if ($id == 'epub') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            array('url' => '/download/mobi.html', 'text' => 'Žonglérův slabikář - mobi', 'title' => 'Žonglérův slabikář ve formátu mobi.'),
            );
        }

        if ($id == 'exe') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            array('url' => '/download/msi.html', 'text' => 'Instalační balíček MSI', 'title' => 'Žonglérův slabikář ve formátu msi.'),
            );
        }

        if ($id == 'msi') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            array('url' => '/download/exe.html', 'text' => 'Instalační balíček EXE', 'title' => 'Žonglérův slabikář ve formátu exe.'),
            array('url' => '/download/tar.bz2.html', 'text' => 'Archiv tar.bz2', 'title' => 'Žonglérův slabikář ve formátu tar.bz2.'),
            );
        }

        if ($id == 'tar.bz2') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            array('url' => '/download/msi.html', 'text' => 'Instalační balíček MSI', 'title' => 'Žonglérův slabikář ve formátu msi.'),
            );
        }

        if ($id == 'wordpress') {
            $dalsi = array(
            array('url' => '/kalendar/widget.html', 'text' => 'Widget pro web stránky', 'title' => 'Univerzální widget pro web stránky.'),
            array('url' => '/jak-odkazovat.html', 'text' => 'Jak odkazovat na žonglérův slabikář', 'title' => 'Jak odkazovat na žonglérův slabikář - připravené HTML kódy'),
            );
        }

        if ($id == 'apk') {
            $dalsi = array(
            array('url' => '/download/licence.html', 'text' => 'Licence - CC BY-ND', 'title' => 'Licence k souboru'),
            );
        }

        if (isset($dalsi)) {
            $smarty->assign('dalsi', $dalsi);
        }

        $smarty->assign('titulek', $titulek.' - '.$id);
        $smarty->assign('nadpis', 'Žonglérův slabikář - '.$id);
        $smarty->assign('description', 'Soubory ke stažení - žonglérův slabikář ve formátu '.$id);

        $smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/img/p/package-'.$id.'.png');
        $trail->addStep($id);
        $smarty->assign('trail', $trail->path);
        $smarty->assign('download_id', $id);

        $smarty->display('hlavicka.tpl');
        if (is_file($smarty->template_dir[0]."/download.static.$id.tpl")) {
            $smarty->display('download.static.'.$id.'.tpl');
        } else {
            $smarty->display('download.detail.tpl');
        }
        $smarty->display('paticka.tpl');
    } else {
        require '../404.php';
        exit();
    }
} else {
    $dalsi = array(
            array('url' => '/literatura.html', 'text' => 'Literatura o žonglování', 'title' => 'Knížky o žonglování'),
            array('url' => '/obrazky-na-plochu/', 'text' => 'Obrázky na plochu', 'title' => 'Tapety s žonglérskou tématikou.'),
            );
    $smarty->assign('dalsi', $dalsi);
    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('download.tpl');
    $smarty->display('paticka.tpl');
}

function get_downloads()
{
    $navrat = array();
    $dir = opendir('./versions');
    $navrat = array();
    if ($dir) {
        while (($filename = readdir($dir)) !== false) {
            if (preg_match('/.+\.xml$/', $filename)) {
                $id = preg_replace('/\.xml$/', '', $filename);
                $navrat[$id] = array('filename' => $filename, 'versions' => get_download_info($filename));
            }
        }
    }
    closedir($dir);

    return $navrat;
}

function get_download_info($filename)
{
    $xml = simplexml_load_file('./versions/'.$filename);
    $download = array();
    $elements = array('version', 'filename', 'md5', 'date', 'img', 'size', 'qr');

    foreach ($xml->release as $release) {
        $foo = array();
        $foo['description'] = (string) $xml->description;
        foreach ($elements as $baz) {
            if ($release->$baz) {
                $foo[$baz] = (string) $release->$baz;
            }
        }
        if (isset($foo['date'])) {
            $foo['date_hr'] = date('j. n. Y', strtotime($foo['date']));
        }
        array_push($download, $foo);
    }

    return $download;
}
