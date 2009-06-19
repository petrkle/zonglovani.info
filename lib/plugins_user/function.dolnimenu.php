<?php

function smarty_function_dolnimenu($params, &$smarty){
	$adresy = array("/","/mapa-stranek.html","/kontakt.html","/podporte-zongleruv-slabikar.html");
	$texty = array("Úvodní stránka","Mapa stránek","Kontakt","Podpoøte ¾onglérùv slabikáø");
	$popis = array("®onglérùv slabikáø - Úvodní stránka","Mapa stránek zonglovani.info","Kontakt","Podpoøit ¾onglérùv slabikáø");

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
