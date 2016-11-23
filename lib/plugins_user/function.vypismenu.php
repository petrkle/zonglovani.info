<?php

function smarty_function_vypismenu($params, &$smarty)
{
    $adresy = array('/', '/novinky/', '/micky/', '/kruhy/', '/kuzely/', '/diabolo/', '/lide/', '/ostatni.html');
    $texty = array('Úvodní stránka', 'Novinky', 'Míčky', 'Kruhy', 'Kužely', 'Diabolo', 'Žongléři', 'Ostatní');
    $popis = array('Úvodní stránka žonglérova slabikáře', 'Novinky ze světa žonglování', 'Začínáme s míčky', 'Začínáme s kruhy', 'Začínáme s kužely', 'Základy s diabolem', 'Seznam uživatelů žonglérova slabikáře.', 'Vše ostatní o žonglování');

    $excluded = array(1, 6);
    $navrat = "<ul>\n";

    for ($foo = 0; $foo < count($adresy); ++$foo) {
        if (in_array($foo, $excluded)) {
            $navrat .= "\n<!-- start -->\n";
        }

        if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
            $navrat .= '<li><h4>'.$texty[$foo].'</h4>';
        } else {
            if ($foo == 1 and is_logged() and isset($_SESSION['changes_pocet']) and $_SESSION['changes_pocet'] > 0) {
                $pocetnovinek = ' <span class="pocetnovinek">'.$_SESSION['changes_pocet'].'</span>';
            } else {
                $pocetnovinek = '';
            }
            $navrat .= '<li><h4><a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a>'.$pocetnovinek.'</h4>';
        }
        $navrat .= submenu($foo);
        $navrat .= "</li>\n";

        if (in_array($foo, $excluded)) {
            $navrat .= "\n<!-- stop -->\n";
        }
    }

    $navrat .= "\n</ul>\n";

    if (!preg_match(SEARCH_URL, $_SERVER['REQUEST_URI'])) {
        $navrat .= '
		<!-- start -->
		<div itemscope itemtype="http://schema.org/WebSite">
		<link itemprop="url" href="https://'.$_SERVER['SERVER_NAME'].'/"/>
			<form action="'.SEARCH_URL.'" method="get" id="malehledani" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
			<meta itemprop="target" content="https://'.$_SERVER['SERVER_NAME'].SEARCH_URL.'?query={query}"/>
		<fieldset>
		<legend>Vyhledávání</legend>
		<input type="text" name="query" itemprop="query-input" class="policko" accesskey="4" required /><input type="submit" value="Najít" class="knoflik" />
		</fieldset>
		</form>
		</div>
		<!-- stop -->
		';
    }

    return $navrat;
}

function submenu($id)
{
    if ($id == 2) {
        $adresy = array('/micky/2/', '/micky/3/', '/micky/4/', '/micky/5/');
        $texty = array('2 míčky', '3 míčky', '4 míčky', '5 míčků');
        $popisky = array('Žonglování se dvěma míčky.', 'Žonglování se třemi míčky.', 'Žonglování se čtyřmi míčky.', 'Žonglování s pěti míčky.');
    }

    if ($id == 4) {
        $adresy = array('/kuzely/3/', '/kuzely/passing/');
        $texty = array('3 kužely', 'Passing');
        $popisky = array('Žonglování se třemi kužely', 'Žonglování ve více lidech');
    }

    if ($id == 6) {
        $adresy = array('/kalendar/', '/diskuse/', '/lide/misto/');
        $texty = array('Kalendář', 'Diskuse', 'Místa');
        $popisky = array('Kalendář žonglování', 'Diskuse a komentáře', 'Žongléři podle místa působení');
    }

    if ($id == 7) {
        $adresy = array('/obrazky/', '/video/', '/animace/', '/download/');
        $texty = array('Obrázky', 'Video', 'Animace', 'Soubory<br/>ke stažení');
        $popisky = array('Obrázky žonglování', 'Zajímavá žonglérská videa', 'Animace žonglování s míčky', 'Žonglérův slabikář jako elektronická kniha, nebo program do počítače');
    }

    if (isset($adresy)) {
        $navrat = '';
        if ($id == 7) {
            $navrat .= "\n<!-- start -->\n";
        }
        $navrat .= "<ul>\n";
        for ($foo = 0; $foo < count($adresy); ++$foo) {
            if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
                $navrat .= '<li><strong>'.$texty[$foo].'</strong></li>'."\n";
            } else {
                $navrat .= '<li><a href="'.$adresy[$foo].'" title="'.$popisky[$foo].'">'.$texty[$foo].'</a>'."</li>\n";
            }
        }
        $navrat .= "</ul>\n";
        if ($id == 7) {
            $navrat .= "\n<!-- stop -->\n";
        }

        return $navrat;
    } else {
        return '';
    }
}
