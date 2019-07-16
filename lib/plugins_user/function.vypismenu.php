<?php

function smarty_function_vypismenu($params, &$smarty)
{
    $adresy = array('/', '/micky/', '/kruhy/', '/kuzely/', '/diabolo/', '/ostatni.html');
    $texty = array('Úvodní stránka', 'Míčky', 'Kruhy', 'Kužely', 'Diabolo', 'Ostatní');
    $popis = array('Úvodní stránka žonglérova slabikáře', 'Začínáme s míčky', 'Začínáme s kruhy', 'Začínáme s kužely', 'Základy s diabolem', 'Vše ostatní o žonglování');

    $excluded = array(5);
    $navrat = "<ul>\n";

    for ($foo = 0; $foo < count($adresy); ++$foo) {
        if (in_array($foo, $excluded)) {
            $navrat .= "\n<!-- start -->\n";
        }

        if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
            $navrat .= '<li><h4>'.$texty[$foo].'</h4>';
        } else {
            $navrat .= '<li><h4><a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a></h4>';
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
        $adresy = array('/obrazky/', '/video/', '/animace/', '/download/');
        $texty = array('Obrázky', 'Video', 'Animace', 'Soubory<br/>ke stažení');
        $popisky = array('Obrázky žonglování', 'Zajímavá žonglérská videa', 'Animace žonglování s míčky', 'Žonglérův slabikář jako elektronická kniha, nebo program do počítače');
    }

    if (isset($adresy)) {
        $navrat = '';
        $navrat .= "<ul>\n";
        for ($foo = 0; $foo < count($adresy); ++$foo) {
            if ($id == 6 and $foo != 2) {
                $navrat .= "\n<!-- start -->\n";
            }

            if ($_SERVER['REQUEST_URI'] == $adresy[$foo] and !isset($_GET['show'])) {
                $navrat .= '<li><strong>'.$texty[$foo].'</strong></li>'."\n";
            } else {
                $navrat .= '<li><a href="'.$adresy[$foo].'" title="'.$popisky[$foo].'">'.$texty[$foo].'</a>'."</li>\n";
            }
            if ($id == 6 and $foo != 2) {
                $navrat .= "\n<!-- stop -->\n";
            }
        }
        $navrat .= "</ul>\n";

        return $navrat;
    } else {
        return '';
    }
}
