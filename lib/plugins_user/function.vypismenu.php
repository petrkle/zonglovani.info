<?php

function smarty_function_vypismenu($params, &$smarty){
	$adresy = array('/micky/','/kruhy/','/kuzely/','/ostatni.html');
	$texty = array('Míčky','Kruhy','Kužely','Ostatní');
	$popis = array('Začínáme s míčky','Začínáme s kruhy','Začínáme s kužely','Vše ostatní o žonglování');

	$navrat="<ul>\n";

	for($foo=0;$foo<count($adresy);$foo++){
		if($_SERVER['REQUEST_URI']==$adresy[$foo] and !isset($_GET['show'])){
			$navrat.="<li><h4>".$texty[$foo]."</h4>\n";
		}else{
			$navrat.='<li><h4><a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a></h4>'."\n";
		};
		$navrat.=submenu($foo);
		$navrat.="</li>\n";
	}

		if(!preg_match('/^\/ulita\/$/',$_SERVER['REQUEST_URI'])){
			$navrat.='<li><h4><a href="/ulita/" title="Nedělní žonglování v DDM Ulita.">Žonglování v Ulitě</a></h4></li>';
		}else{
			$navrat.='<li><h4>Žonglování v Ulitě</h4></li>';
		}

	$navrat.="\n<ul>\n";
			if(!preg_match(SEARCH_URL,$_SERVER['REQUEST_URI'])){
	$navrat.='<form action="'.SEARCH_URL.'" method="get" id="malehledani">
		<fieldset>
		<legend>Vyhledávání</legend>
		<input type="text" name="query" class="policko" accesskey="4" /><input type="submit" value="Najít" class="knoflik" />
		<input type="hidden" name="search" value="1" />
		</fieldset>
		</form>';
			}


	return $navrat;

}

function submenu($id){

	if($id==0){
		$adresy = array('/micky/2/','/micky/3/','/micky/4/','/micky/5/');
		$texty = array('2 míčky','3 míčky','4 míčky','5 míčků');
		$popisky = array('Žonglování se dvěma míčky.','Žonglování se třemi míčky.','Žonglování se čtyřmi míčky.','Žonglování s pěti míčky.');
	}

	if($id==2){
		$adresy = array('/kuzely/3/','/kuzely/passing/');
		$texty = array('3 kužely','Passing');
		$popisky = array('Žonglování se třemi kužely','Žonglování ve více lidech');
	}

	if($id==3){
		$adresy = array('/obrazky/','/video/','/kalendar/','/diskuse/','/lide/','/horoskop/');
		$texty = array('Obrázky','Video','Kalendář','Diskuse','Žongléři','Horoskop');
		$popisky = array('Obrázky žonglování','Zajímavá žonglérská videa','Kalendář žonglování','Diskuse o žonglování','Seznam uživatelů žonglérova slabikáře.','Horoskop žonglování');
	}

	if(isset($adresy)){
		$navrat="<ul>\n";
		for($foo=0;$foo<count($adresy);$foo++){
			if($_SERVER["REQUEST_URI"]==$adresy[$foo] and !isset($_GET["show"])){
				$navrat.='<li><strong>'.$texty[$foo].'</strong></li>'."\n";
			}else{
				$navrat.='<li><a href="'.$adresy[$foo].'" title="'.$popisky[$foo].'">'.$texty[$foo].'</a>'."\n";
			};
		};
		$navrat.="</ul>\n";
		return $navrat;
	}else{
		return '';
	}
}

?>
