<?php

function smarty_function_dolnimenu($params, &$smarty){
	$adresy = array("/","/mapa-stranek.html","/kontakt.html","/podporte-zongleruv-slabikar.html");
	$texty = array("�vodn� str�nka","Mapa str�nek","Kontakt","Podpo�te �ongl�r�v slabik��");
	$popis = array("�ongl�r�v slabik�� - �vodn� str�nka","Mapa str�nek zonglovani.info","Kontakt","Podpo�it �ongl�r�v slabik��");

	$navrat="";

	for($foo=0;$foo<count($adresy);$foo++){
		if($_SERVER["REQUEST_URI"]==$adresy[$foo]){
			$navrat.="<strong>".$texty[$foo]."</strong>";
		}else{
			$navrat.="<a href=\"".$adresy[$foo]."\" title=\"".$popis[$foo]."\">".$texty[$foo]."</a>";
		};
		if($foo < count($adresy)-1){
			$navrat.= " ~ ";
		}
	}

	return $navrat;

}


?>
