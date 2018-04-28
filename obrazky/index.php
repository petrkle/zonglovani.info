<?php

require '../init.php';
require '../func.php';
require '../cache.php';

if (preg_match('/index\.php$/', $_SERVER['REQUEST_URI'])) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.OBRAZKY_URL);
    exit();
}

$trail = new Trail();
$trail->addStep('Obrázky žonglování', OBRAZKY_URL);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = false;
}

if (isset($_GET['photo'])) {
    $photo = $_GET['photo'];
} else {
    $photo = false;
}

if (isset($_GET['filtr'])) {
    $filtr = $_GET['filtr'];
} else {
    $filtr = false;
}

if (isset($_GET['filtry'])) {
    $filtry = true;
} else {
    $filtry = false;
}

if (isset($_GET['pageID'])) {
    $stranka = $_GET['pageID'];
} else {
    $stranka = false;
}

if (isset($_GET['rss'])) {
    $rss = $_GET['rss'];
} else {
    $rss = false;
}

if ($rss) {
    header('Content-Type: application/xml');
    http_cache_headers(3600, true);
    $smarty->assign('obrazky', get_galerie());
    if (isset($_GET['v'])) {
        $smarty->display('obrazky.rss2.tpl');
    } else {
        $smarty->display('obrazky.rss.tpl');
    }
    exit();
} else {
    http_cache_headers(3600);
}

if ($id) {
    $gal_info = get_galerie_info($id);
    if (isset($gal_info['title'])) {
        $smarty->assign('gal_id', $id);
        require $lib.'/Pager/Pager.php';
        $obrazky = get_galerie_obrazky($id);

        $poradi = 0;
        foreach ($obrazky as $key => $foo) {
            $obrazky[$key]['cislo'] = $poradi;
            if ($poradi != 0) {
                $obrazky[$key]['predchozi_cislo'] = sprintf('%04d', $poradi - 1);
            }
            if ($poradi < count($obrazky) - 1) {
                $obrazky[$key]['dalsi_cislo'] = sprintf('%04d', $poradi + 1);
            }
            if ($poradi < count($obrazky) - 2) {
                $obrazky[$key]['dalsi_cislo2'] = sprintf('%04d', $poradi + 2);
            }
            if ($poradi < count($obrazky) - 3) {
                $obrazky[$key]['dalsi_cislo3'] = sprintf('%04d', $poradi + 3);
            }
            ++$poradi;
        }

        $pagerOptions = array(
                'mode' => 'Sliding',
                'delta' => 2,
                'firstLinkTitle' => 'První stránka náhledů',
                'perPage' => 15,
                'altPrev' => 'Předchozí stránka náhledů',
                'altNext' => 'Další stránka náhledů',
                'altPage' => 'Stránka náhledů',
                'linkClass' => 'pl',
                'separator' => '&nbsp;',
                'spacesBeforeSeparator' => 1,
                'spacesAfterSeparator' => 1,
                'append' => false,
                'firstLinkNull' => true,
                'path' => OBRAZKY_URL.$id,
                'fileName' => 'stranka%d/',
                'itemData' => $obrazky,
        );
        $pager = &Pager::factory($pagerOptions);
        $data = $pager->getPageData();

        $first_img = array_slice($data, 0, 1);
        if (strlen($first_img[0]['nahled']) > 0) {
            $smarty->assign('nahled', $first_img[0]['nahled']);
        }

        $moznestranky = array();

        foreach ($obrazky as $key => $foo) {
            $cislostranky = $pager->getPageIdByOffset($foo['cislo']);
            $obrazky[$key]['stranka'] = $cislostranky;
            $moznestranky[$cislostranky] = true;
            $predchozi = $pager->getPageIdByOffset(($foo['cislo'] - 1));
            $obrazky[$key]['dalsi_stranka'] = $pager->getPageIdByOffset($foo['cislo'] + 1);
            if ($predchozi != 1) {
                $obrazky[$key]['predchozi_stranka'] = $predchozi;
            }
        }

        if ($stranka and !isset($moznestranky[$stranka])) {
            http_response_code(404);
            exit();
        }

        $smarty->assign('items', $data);
        $smarty->assign('pager_links', $pager->links);
        $smarty->assign(
                'page_numbers',
            array(
                        'current' => $pager->getCurrentPageID(),
                        'total' => $pager->numPages(),
                )
        );
    } else {
        http_response_code(404);
        exit();
    }
}
if ($id and $photo) {
    $smarty->assign('feedback', true);
    $smarty->assign('fbsdileni', 'tento obrázek');
    if (isset($obrazky[intval($photo)])) {
        $hlavicky = array();
        if (isset($gal_info['icbm'])) {
            $smarty->assign('icbm', $gal_info['icbm']);
        }
        if (preg_match('/.*ulita.*/', $_SERVER['REQUEST_URI'])) {
            require '../ulita/datumy.php';
            $smarty->assign('pristiulita', get_next_ulita(array_merge($podzim, $jaro)));
        }
        $smarty->assign('stranka', $pager->getPageIdByOffset($photo));
        $smarty->assign('nahled', $obrazky[intval($photo)]['nahled']);
        $smarty->assign('imgdir', OBRAZKY_URL.$id);
        $titulek = $gal_info['title'].' - '.intval($photo).'. obrázek';
        $smarty->assign('description', $titulek);
        $smarty->assign('keywords', 'žonglování, fotky, '.intval($photo).'. obrázek, '.make_keywords($gal_info['title']));
        $obrazek = &$obrazky[intval($photo)];
        if ($obrazek['stranka'] == 1) {
            $page = '/';
        } else {
            $page = '/stranka'.$obrazek['stranka'].'/';
        }

        $trail->addStep($gal_info['title'], OBRAZKY_URL.$id.'/');

        if ($obrazky[intval($photo)]['stranka'] != 1) {
            $titulek .= ' - stránka '.$obrazek['stranka'];
            $trail->addStep($stranka.'. stránka ', OBRAZKY_URL.$id.'/stranka'.$stranka.'/');
        }

        $trail->addStep(intval($photo).'. obrázek');

        if ($pager->getCurrentPageID() == $pager->numPages()) {
            if (isset($obrazek['dalsi_cislo'])) {
                $dalsistranka = OBRAZKY_URL.$id.'/stranka'.($obrazek['dalsi_stranka']).'/'.$obrazek['dalsi_cislo'].'.html';
            } else {
                $dalsistranka = OBRAZKY_URL.$id.'/stranka'.$pager->numPages().'/';
            }
        } else {
            if (isset($obrazek['dalsi_cislo'])) {
                $dalsistranka = OBRAZKY_URL.$id.'/stranka'.($obrazek['dalsi_stranka']).'/'.$obrazek['dalsi_cislo'].'.html';
            } else {
                $dalsistranka = OBRAZKY_URL.$id.'/';
            }
        }

        if ($pager->getCurrentPageID() == 1) {
            if (isset($obrazek['predchozi_cislo'])) {
                $predchozistranka = OBRAZKY_URL.$id.'/'.$obrazek['predchozi_cislo'].'.html';
            } else {
                $predchozistranka = OBRAZKY_URL.$id.'/';
            }

            if (isset($obrazek['dalsi_stranka'])) {
                if (isset($obrazek['dalsi_cislo'])) {
                    $dalsistranka = OBRAZKY_URL.$id.'/'.$obrazek['dalsi_cislo'].'.html';
                } else {
                    $dalsistranka = OBRAZKY_URL.$id.'/';
                }
            }
        } else {
            if (isset($obrazek['predchozi_stranka'])) {
                $predchozistranka = OBRAZKY_URL.$id.'/stranka'.($obrazek['predchozi_stranka']).'/'.$obrazek['predchozi_cislo'].'.html';
            } else {
                $predchozistranka = OBRAZKY_URL.$id.'/'.$obrazek['predchozi_cislo'].'.html';
            }
        }

        $hlavicky['dalsi'] = '<link rel="next" href="'.$dalsistranka.'" />';
        $hlavicky['predchozi'] = '<link rel="previous" href="'.$predchozistranka.'" />';
        $hlavicky['obsah'] = '<link rel="contents" href="'.OBRAZKY_URL.$id.'/" />';
        $hlavicky['prvni'] = '<link rel="first" href="'.$obrazky[0]['url'].'" />';
        $hlavicky['posledni'] = '<link rel="last" href="'.$obrazky[(count($obrazky) - 1)]['url'].'" />';
        $hlavicky['nahoru'] = '<link rel="up" href="'.OBRAZKY_URL.$id.$page.'" />';

        if (count($hlavicky) > 0) {
            $smarty->assign('custom_headers', $hlavicky);
        }

        $smarty->assign('trail', $trail->path);
        $smarty->assign('titulek', $titulek);
        $smarty->assign('nadpis', $gal_info['title']);
        $smarty->assign('gal_info', $gal_info);
        $smarty->assign('obrazek', $obrazek);
        if ($_SERVER['REQUEST_URI'] != OBRAZKY_URL.$id.$page.$obrazek['url_file']) {
            header('Location: '.OBRAZKY_URL.$id.$page.$obrazek['url_file']);
            exit();
        }
        $smarty->assign('stylwidth', $obrazek['fsirka']);
        $smarty->display('hlavicka-w.tpl');
        $smarty->display('obrazek.tpl');
        $smarty->display('paticka-w.tpl');
    } else {
        http_response_code(404);
        exit();
    }
} elseif ($id and !$photo) {
    if (isset($gal_info['icbm'])) {
        $smarty->assign('icbm', $gal_info['icbm']);
    }

    $titulek = $gal_info['title'].' - obrázky žonglování';

    $smarty->assign('nadpis', $gal_info['title']);

    $trail->addStep($gal_info['title'], OBRAZKY_URL.$id.'/');

    $smarty->assign('description', $gal_info['title'].' - fotky žonglování.');
    $smarty->assign('keywords', make_keywords('žonglování, fotky, '.$gal_info['title']));

    if ($stranka) {
        $smarty->assign('stranka', $stranka);
        if ($stranka != 1) {
            $titulek .= ' - stránka '.$stranka;
            $trail->addStep('Stránka '.$stranka, OBRAZKY_URL.$id.'/stranka'.$stranka.'/');
            $smarty->assign('description', $gal_info['title'].', fotky žonglování - stránka '.$stranka);
            $smarty->assign('keywords', make_keywords('žonglování, fotky, '.$gal_info['title']).', '.$stranka.'. stránka');
        }
    }
    $dalsi = array(
        array('url' => OBRAZKY_URL, 'text' => 'Další obrázky žonglování', 'title' => 'Další obrázky žonglování'),
        array('url' => OBRAZKY_URL.'#vyzva', 'text' => 'Přidat vlastní obrázky', 'title' => 'Zveřejni v žonglérově slabikáři vlastní fotky žonglování'),
        );

    if ($pager->getCurrentPageID() == $pager->numPages()) {
        $dalsistranka = OBRAZKY_URL.$id.'/';
    } else {
        $dalsistranka = OBRAZKY_URL.$id.'/stranka'.(($pager->getCurrentPageID()) + 1).'/';
    }

    if ($pager->getCurrentPageID() == 1) {
        $predchozistranka = OBRAZKY_URL.$id.'/stranka'.$pager->numPages().'/';
    } else {
        $predchozistranka = OBRAZKY_URL.$id.'/stranka'.(($pager->getCurrentPageID()) - 1).'/';
    }

    $hlavicky = array();
    $hlavicky['dalsi'] = '<link rel="next" href="'.$dalsistranka.'" />';
    $hlavicky['predchozi'] = '<link rel="previous" href="'.$predchozistranka.'" />';
    $hlavicky['obsah'] = '<link rel="contents" href="'.OBRAZKY_URL.$id.'/" />';
    $hlavicky['prvni'] = '<link rel="first" href="'.OBRAZKY_URL.$id.'/" />';
    $hlavicky['posledni'] = '<link rel="last" href="'.OBRAZKY_URL.$id.'/stranka'.$pager->numPages().'/'.'" />';
    $hlavicky['nahoru'] = '<link rel="up" href="'.OBRAZKY_URL.'" />';

    if (count($hlavicky) > 0) {
        $smarty->assign('custom_headers', $hlavicky);
    }

    $smarty->assign('dalsi', $dalsi);
    $smarty->assign('trail', $trail->path);
    $smarty->assign('titulek', $titulek);
    $smarty->assign('gal_info', $gal_info);
    $smarty->display('hlavicka.tpl');
    $smarty->display('obrazky.tpl');
    $smarty->display('paticka.tpl');
} elseif ($filtr) {
    $smarty->assign('titulek', $filtr.' - filtr obrázků');
    $smarty->assign('nadpis', $filtr.' - filtr obrázků');
    $smarty->assign('notitle', true);
    $galerie = get_galerie($filtr);

    $trail->addStep('Filtr obrázků', OBRAZKY_URL.'filtr/');
    $trail->addStep($filtr);

    if (count($galerie) > 0) {
        foreach ($galerie as $klic => $gal) {
            $galerie[$klic]['obrazky'] = get_nahled_galerie($gal['name']);
        }
    }
    $smarty->assign('galerie', $galerie);
    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('obrazky-filtr.tpl');
    $smarty->display('paticka.tpl');
} elseif ($filtry) {
    $trail->addStep('Filtr obrázků');
    $smarty->assign('description', 'Filtry žonglérských obrázků.');
    $smarty->assign('titulek', 'Filtry obrázků');
    $smarty->assign('trail', $trail->path);
    $smarty->display('hlavicka.tpl');
    $smarty->display('obrazky-filtry.tpl');
    $smarty->display('paticka.tpl');
} else {
    // index adresáře /obrazky/

    $smarty->assign('feedback', true);
    $smarty->assign('nahled', 'https://'.$_SERVER['SERVER_NAME'].'/obrazky/drazdany-20110312/0030.jpg');

    $dalsi = array(
        array('url' => '/obrazky-na-plochu/', 'text' => 'Obrázky na plochu', 'title' => 'Tapety s žonglérskou tématikou.'),
        array('url' => '/video/', 'text' => 'Žonglérská videa', 'title' => 'Pohyblivé obrázky'),
        array('url' => '/animace/', 'text' => 'Animace žonglování', 'title' => 'Animace triků s míčky'),
        );
    require $lib.'/Pager/Pager.php';
    $galerie = get_galerie();

    $pagerOptions = array(
                'mode' => 'Sliding',
                'delta' => 2,
                'firstLinkTitle' => 'První stránka obrázků',
                'perPage' => 6,
                'altPrev' => 'Předchozí stránka obrázků',
                'altNext' => 'Další stránka obrázků',
                'altPage' => 'Stránka obrázků',
                'linkClass' => 'pl',
                'separator' => '&nbsp;',
                'spacesBeforeSeparator' => 1,
                'spacesAfterSeparator' => 1,
                'append' => false,
                'firstLinkNull' => true,
                'fileName' => 'stranka%d.html',
                'itemData' => $galerie,
        );
    $pager = &Pager::factory($pagerOptions);
    $data = $pager->getPageData();

    if ($stranka) {
        if ($stranka != $pager->getCurrentPageID()) {
            http_response_code(404);
            exit();
        }
    }

    if (count($data) > 0) {
        foreach ($data as $klic => $gal) {
            $data[$klic]['obrazky'] = get_nahled_galerie($gal['name']);
        }
    }
    $smarty->assign('pager_links', $pager->links);
    $smarty->assign(
            'page_numbers',
        array(
                    'current' => $pager->getCurrentPageID(),
                    'total' => $pager->numPages(),
            )
    );
    $titulek = 'Obrázky žonglování';
    $desc = 'Obrázky žonglování s míčky, kruhy a kužely.';
    if ($pager->getCurrentPageID() > 1) {
        $smarty->assign('nadpis', $titulek);
        $titulek .= ' - '.$pager->getCurrentPageID().'. stránka';
        $desc .= ' '.$pager->getCurrentPageID().'. stránka';
        $trail->addStep($pager->getCurrentPageID().'. stránka');
    }

    if ($pager->getCurrentPageID() == $pager->numPages()) {
        $dalsistranka = OBRAZKY_URL;
    } else {
        $dalsistranka = OBRAZKY_URL.'stranka'.(($pager->getCurrentPageID()) + 1).'.html';
    }

    if ($pager->getCurrentPageID() == 1) {
        $predchozistranka = OBRAZKY_URL.'stranka'.$pager->numPages().'.html';
    } else {
        $predchozistranka = OBRAZKY_URL.'stranka'.(($pager->getCurrentPageID()) - 1).'.html';
    }

    $hlavicky = array();
    $hlavicky['dalsi'] = '<link rel="next" href="'.$dalsistranka.'" />';
    $hlavicky['predchozi'] = '<link rel="previous" href="'.$predchozistranka.'" />';
    $hlavicky['obsah'] = '<link rel="contents" href="'.OBRAZKY_URL.'" />';
    $hlavicky['prvni'] = '<link rel="first" href="'.OBRAZKY_URL.'" />';
    $hlavicky['posledni'] = '<link rel="last" href="'.OBRAZKY_URL.'stranka'.$pager->numPages().'.html'.'" />';
    $hlavicky['nahoru'] = '<link rel="up" href="/" />';

    if (count($hlavicky) > 0) {
        $smarty->assign('custom_headers', $hlavicky);
    }

    $smarty->assign('description', $desc);
    $smarty->assign('dalsi', $dalsi);
    $smarty->assign('trail', $trail->path);
    $smarty->assign('titulek', $titulek);
    $smarty->assign('galerie', $data);
    $smarty->display('hlavicka.tpl');
    $smarty->display('obrazky-index.tpl');
    $smarty->display('paticka.tpl');
}

function get_galerie($filtr = '.+')
{
    $dir = opendir(OBRAZKY_DATA);
    $navrat = array();
    if ($dir) {
        while (($filename = readdir($dir)) !== false) {
            if (!preg_match('/^\./', $filename) and is_dir(OBRAZKY_DATA.'/'.$filename) and preg_match('/'.$filtr.'/i', $filename)) {
                $datum = preg_split('/-/', $filename);
                $datum = array_pop($datum);
                $info = get_galerie_info($filename);
                if ($info) {
                    $datum_mr = substr($datum, 0, 4).'-'.substr($datum, 4, 2).'-'.substr($datum, 6, 2).'T'.date('H:i:s', filemtime(OBRAZKY_DATA.'/'.$filename.'/index.txt')).'+02:00';
                    $datum_rss2 = date('r', strtotime($datum));
                    if (isset($info['autor'])) {
                        $autor = $info['autor'];
                    } else {
                        $autor = $_SERVER['SERVER_NAME'];
                    }
                    array_push($navrat, array('name' => $filename, 'title' => $info['title'], 'datum' => $datum, 'autor' => $autor, 'datum_mr' => $datum_mr, 'datum_rss2' => $datum_rss2));
                }
            }
        }
    }
    closedir($dir);
    usort($navrat, 'sort_by_datum');

    return $navrat;
}

function sort_by_datum($a, $b)
{
    return ($a['datum'] > $b['datum']) ? -1 : 1;
}

function get_galerie_info($galerie)
{
    $navrat = array();
    if (is_file(OBRAZKY_DATA.'/'.$galerie.'/index.txt')) {
        $foo = file(OBRAZKY_DATA.'/'.$galerie.'/index.txt');
        foreach ($foo as $radek) {
            $radek = trim($radek);
            $zac = strpos($radek, ':');
            $navrat[substr($radek, 0, $zac)] = substr($radek, $zac + 1);
        }
    }
    if (isset($navrat['url'])) {
        $navrat['url_hr'] = preg_replace('/^https:\/\/zonglovani.info/', '', $navrat['url']);
    }

    return $navrat;
}

function get_galerie_obrazky($galerie)
{
    $dir = opendir(OBRAZKY_DATA.'/'.$galerie);
    $navrat = array();
    if ($dir) {
        while (($filename = readdir($dir)) !== false) {
            if (preg_match('/.+\.(jpg|jpeg|png|gif)$/', $filename)) {
                $foo = array();
                if (is_file(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename)) {
                    $pripona = preg_split('/\./', $filename);
                    $pripona = array_pop($pripona);
                    $foo['obrazek'] = 'https://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/'.$filename;
                    $size = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename);
                    $fsize = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/'.$filename);
                    $foo['sirka'] = $size[0];
                    $foo['vyska'] = $size[1];
                    $foo['fsirka'] = $fsize[0];
                    $foo['fvyska'] = $fsize[1];
                    $foo['url'] = OBRAZKY_URL.$galerie.'/'.basename($filename, $pripona).'html';
                    $foo['url_file'] = basename($filename, $pripona).'html';
                    $foo['margin_h'] = floor((148 - $size[0]) / 2);
                    $foo['margin_v'] = floor((148 - $size[1]) / 2);
                    $foo['nahled'] = 'https://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/nahledy/'.$filename;
                    array_push($navrat, $foo);
                }
            }
        }
    }
    closedir($dir);
    sort($navrat);

    return $navrat;
}

function get_nahled_galerie($galerie)
{
    $dir = opendir(OBRAZKY_DATA.'/'.$galerie);
    $nahledy = array(2, 4, 6);
    $navrat = array();
    if ($dir) {
        foreach ($nahledy as $bar) {
            $foo = array();
            $filename = sprintf('%04d', $bar).'.jpg';
            if (is_file(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename)) {
                $pripona = preg_split('/\./', $filename);
                $pripona = array_pop($pripona);
                $foo['obrazek'] = 'https://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/'.$filename;
                $size = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename);
                $fsize = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/'.$filename);
                $foo['sirka'] = $size[0];
                $foo['vyska'] = $size[1];
                $foo['fsirka'] = $fsize[0];
                $foo['fvyska'] = $fsize[1];
                $foo['url'] = OBRAZKY_URL.$galerie.'/'.basename($filename, $pripona).'html';
                $foo['url_file'] = basename($filename, $pripona).'html';
                $foo['margin_h'] = floor((148 - $size[0]) / 2);
                $foo['margin_v'] = floor((148 - $size[1]) / 2);
                $foo['nahled'] = 'https://'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/nahledy/'.$filename;
                array_push($navrat, $foo);
            }
        }
    }

    return $navrat;
}
