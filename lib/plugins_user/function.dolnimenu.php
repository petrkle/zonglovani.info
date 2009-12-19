<?php

function smarty_function_dolnimenu($params, &$smarty){
	$adresy = array('/','/mapa-stranek.html','/kontakt.html','/podporte-zongleruv-slabikar.html');
	$texty = array('Úvodní stránka','Mapa stránek','Kontakt','Podpořte žonglérův slabikář');
	$popis = array('Žonglérův slabikář - Úvodní stránka','Mapa stránek zonglovani.info','Kontakt','Podpořit žonglérův slabikář');

	$navrat="";

	for($foo=0;$foo<count($adresy);$foo++){
		if($_SERVER['REQUEST_URI']==$adresy[$foo]){
			$navrat.='<strong>'.$texty[$foo].'</strong>';
		}else{
			if($adresy[$foo]=='/mapa-stranek.html'){
				$navrat.='<a href="'.$adresy[$foo].'" accesskey="3" title="'.$popis[$foo].'">'.$texty[$foo].'</a>';
			}else{
				$navrat.='<a href="'.$adresy[$foo].'" title="'.$popis[$foo].'">'.$texty[$foo].'</a>';
			}
		};
		if($foo < count($adresy)-1){
			$navrat.= ' ~ ';
		}
	}

	return $navrat;

}


?>
