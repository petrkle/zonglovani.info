<?php

function smarty_function_dolnimenu($params, &$smarty){
	$adresy = array("/","/mapa-stranek.html","/kontakt.html","/pristupnost.html");
	$texty = array("zonglovani.info","Mapa stránek","Kontakt","Prohlá¹ení o pøístupnosti");
	$popis = array("®onglérùv slabikáø - Úvodní stránka","Mapa stránek zonglovani.info","Kontakt","Prohlá¹ení o pøístupnosti");

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
