<?php

function smarty_function_vypismenu($params, &$smarty)
{
    $adresy = array('/', '/micky/', '/kruhy/', '/kuzely/', '/diabolo/', '/ostatni.html');
    $texty = array('Úvodní stránka', 'Míčky', 'Kruhy', 'Kužely', 'Diabolo', 'Ostatní');
    $popis = array('Úvodní stránka žonglérova slabikáře', 'Začínáme s míčky', 'Začínáme s kruhy', 'Začínáme s kužely', 'Základy s diabolem', 'Vše ostatní o žonglování');

    $navrat = "<ul>\n";

    for ($foo = 0; $foo < count($adresy); ++$foo) {
        if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
            $navrat .= '<li><h4>'.$texty[$foo].'</h4>';
        } else {
            $navrat .= '<li><h4><a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a></h4>';
        }
        $navrat .= submenu($foo);
        $navrat .= "</li>\n";
    }

    $navrat .= "\n</ul>\n";

    return $navrat;
}

function submenu($id)
{
    if ($id == 1) {
        $adresy = array('/micky/2/', '/micky/3/', '/micky/4/', '/micky/5/');
        $texty = array('2 míčky', '3 míčky', '4 míčky', '5 míčků');
        $popisky = array('Žonglování se dvěma míčky.', 'Žonglování se třemi míčky.', 'Žonglování se čtyřmi míčky.', 'Žonglování s pěti míčky.');
    }

    if ($id == 3) {
        $adresy = array('/kuzely/3/', '/kuzely/passing/');
        $texty = array('3 kužely', 'Passing');
        $popisky = array('Žonglování se třemi kužely', 'Žonglování ve více lidech');
    }

    if ($id == 5) {
        $adresy = array('/animace/', '/download/');
        $texty = array('Animace', 'Soubory<br/>ke stažení');
        $popisky = array('Animace žonglování s míčky', 'Žonglérův slabikář jako elektronická kniha, nebo program do počítače');
    }

    if (isset($adresy)) {
        $navrat = '';
        $navrat .= "<ul>\n";
        for ($foo = 0; $foo < count($adresy); ++$foo) {
            if ($id == 5 and $foo != 0) {
                $navrat .= "\n<!-- start -->\n";
            }

            if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
                $navrat .= '<li><strong>'.$texty[$foo].'</strong></li>'."\n";
            } else {
                $navrat .= '<li><a href="'.$adresy[$foo].'" title="'.$popisky[$foo].'">'.$texty[$foo].'</a>'."</li>";
            }
            if ($id == 5 and $foo != 0) {
                $navrat .= "\n<!-- stop -->\n";
            }
        }
        $navrat .= "</ul>\n";

        return $navrat;
    } else {
        return '';
    }
}
