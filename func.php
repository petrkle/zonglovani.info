<?php

function nacti_trik($soubor)
{
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/xml/'.basename($soubor).'.xml');
    $trik = array();
    $trik['kroky'] = array();
    $trik['about'] = (array) $xml->about;
    $trik['img_maxwidth'] = 0;
    foreach ($xml->krok as $krok) {
        $foo = array();
        if ($krok->popisek) {
            $foo['popisek'] = (string) $krok->popisek;
        }
        if ($krok->pre) {
            $foo['pre'] = (string) $krok->pre;
        }
        if ($krok->obrazek) {
            $foo['obrazek'] = (string) $krok->obrazek;

            if (!preg_match('/\.(jpg|gif|png)$/', $foo['obrazek'])) {
                $foo['obrazek'] = $foo['obrazek'].'.png';
            }

            if ($krok->obrazek['src']) {
                $foo['obrazek_src'] = (string) $krok->obrazek['src'];
                $foo['obrazek_src'] = '/img/'.substr($foo['obrazek_src'], 0, 1).'/'.$foo['obrazek_src'];
            }

            if (isset($foo['obrazek'])) {
                $path = $_SERVER['DOCUMENT_ROOT'].'/img/'.substr($foo['obrazek'], 0, 1).'/'.$foo['obrazek'];
                if (is_readable($path)) {
                    $obrazekinfo = getimagesize($path);
                    if ($obrazekinfo[0] > $trik['img_maxwidth']) {
                        $trik['img_maxwidth'] = $obrazekinfo[0];
                    }
                }
            }
        }
        if ($krok->nadpis) {
            $foo['nadpis'] = (string) $krok->nadpis;
            if ($krok->nadpis['name']) {
                $foo['kotva'] = (string) $krok->nadpis['name'];
            }
        }
        if ($krok->video or $krok->animace) {
            if ($krok->video) {
                $foo['video'] = (string) $krok->video;
            }
            if ($krok->animace) {
                $foo['animace'] = (string) $krok->animace;
            }
        }
        array_push($trik['kroky'], $foo);
    }

    if (isset($xml->dalsi)) {
        $trik['dalsi'] = array();
        foreach ($xml->dalsi->link as $odkaz) {
            if (isset($odkaz['url'])) {
                $url = (string) $odkaz['url'];
                $text = (string) $odkaz;
                $trik['dalsi'][$url]['text'] = $text;
                if (isset($odkaz['title'])) {
                    $trik['dalsi'][$url]['title'] = (string) $odkaz['title'];
                }
            }
        }
    }

    return $trik;
}

function get_anim($url)
{
    $foo = file($_SERVER['DOCUMENT_ROOT'].'/animace/odkazy.txt');
    $linky = array();
    $navrat = false;
    foreach ($foo as $radek) {
        $radek = trim($radek);
        $radek = preg_split('/\*/', $radek);
        if (count($radek) == 3 and $radek[1] == $url) {
            $navrat = array('id' => $radek[0]);
        }
    }

    return $navrat;
}

function get_seznam_triku($jake)
{
    $ls = $_SERVER['DOCUMENT_ROOT'].'/xml';
    if (is_dir($ls) and opendir($ls)) {
        $vypis = array();
        $adr = opendir($ls);
        while (false !== ($file = readdir($adr))) {
            $vzor = str_replace('.php', '', str_replace('/', '-', str_replace($_SERVER['DOCUMENT_ROOT'].'/', '', $jake)));
            if (substr($file, -4) == '.xml' and preg_match('/'.$vzor.'/', $file)) {
                $file = substr($file, 0, -4);
                $vypis[preg_replace('/'.$vzor.'-/', '', basename($file, '.xml'))] = nacti_trik($file);
            }
        }
        closedir($adr);
    }

    $collator = collator_create('cs_CZ.UTF-8');
    usort($vypis, function ($a, $b, $collator) {
        $arr = array($a['about']['nazev'], $b['about']['nazev']);
        collator_asort($collator, $arr, Collator::SORT_STRING);
        return array_pop($arr) == $a['about']['nazev'];
    });

    return $vypis;
}

function make_keywords($text)
{
    $navrat = array();
    $text = preg_replace('/,/', ' ', $text);
    $text = preg_replace('/-/', ' ', $text);
    $text = preg_replace('/  /', ' ', $text);
    $text = mb_strtolower($text, 'UTF8');
    $text = preg_split('/ /', $text);
    foreach ($text as $foo) {
        if (strlen($foo) >= 3) {
            array_push($navrat, $foo);
        }
    }
    if (count($navrat) < 2) {
        array_push($navrat, 'žonglování', 'míčky', 'kruhy', 'kužely');
    }

    $navrat = preg_replace('/ /', ', ', implode(' ', $navrat));

    return $navrat;
}

function get_nahled($trik)
{
    $nahled = '';
    foreach ($trik['kroky'] as $krok) {
        if (strlen($nahled) == 0 and isset($krok['obrazek'])) {
            $nahled = 'https://'.$_SERVER['SERVER_NAME'].'/img/'.substr($krok['obrazek'], 0, 1).'/'.$krok['obrazek'];
        }
    }
    if (strlen($nahled) == 0) {
        $nahled = 'https://'.$_SERVER['SERVER_NAME'].'/img/n/nacinid.png';
    }

    return $nahled;
}

function get_description($trik)
{
    $popis = '';
    if (isset($trik['kroky'][0]['popisek'])) {
        $popis .= $trik['kroky'][0]['popisek'];
    }
    return strip_tags($popis);
}

class Trail
{
    public $path = array();

    public function Trail($includeHome = true, $homeLabel = 'Žonglování', $homeLink = '/')
    {
        if ($includeHome) {
            $this->addStep($homeLabel, $homeLink);
        }
    }

    public function addStep($title, $link = '')
    {
        $item = array('title' => $title);
        if (strlen($link) > 0) {
            $item['link'] = $link;
        }
        $this->path[] = $item;
    }
}
