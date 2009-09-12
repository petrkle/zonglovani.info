<?php

function smarty_function_vypismenu($params, &$smarty){
	$adresy = array("/","/micky/","/kruhy/","/kuzely/","/ostatni.html");
	$texty = array("Úvodní stránka","Míèky","Kruhy","Ku¾ely","Ostatní");
	$popis = array("®onglérùv slabikáø - Úvodní stránka","Zaèínáme s míèky","Zaèínáme s kruhy","Zaèínáme s ku¾ely","V¹e ostatní o ¾onglování");

	$navrat="<ul>\n";

	for($foo=0;$foo<count($adresy);$foo++){
		if($_SERVER["REQUEST_URI"]==$adresy[$foo] and !isset($_GET["show"])){
			if(($_SERVER["REQUEST_URI"]!="/")){
				$navrat.="<li><h4>".$texty[$foo]."</h4>\n";
			};
		}else{
			$navrat.="<li><h4><a href=\"".$adresy[$foo]."\" title=\"".$popis[$foo]."\">".$texty[$foo]."</a></h4>\n";
		};
		$navrat.=submenu($foo);
		$navrat.="</li>\n";
	}

	$navrat.="\n<ul>\n";
			if(!preg_match("/vyhledavani/",$_SERVER["REQUEST_URI"])){
	$navrat.='<form action="/vyhledavani/" method="get" id="malehledani">
		<fieldset>
		<legend>Vyhledávání</legend>
		<input type="text" name="query" class="policko" /><input type="submit" value="Najít" class="knoflik" />
		<input type="hidden" name="search" value="1" />
		</fieldset>
		</form>';
			}

	return $navrat;

}

function submenu($id){

	if($id==1){
		$adresy = array("/micky/2/","/micky/3/","/micky/4/","/micky/5/");
		$texty = array("2 míèky","3 míèky","4 míèky","5 míèkù");
		$popisky = array("®onglování se dvìma míèky.","®onglování se tøemi míèky.","®onglování se ètyømi míèky.","®onglování s pìti míèky.");
	}

	if($id==3){
		$adresy = array("/kuzely/3/","/kuzely/passing/");
		$texty = array("3 ku¾ely","Passing");
		$popisky = array("®onglování se tøemi ku¾ely","®onglování ve více lidech");
	}

	if($id==4){
		$adresy = array("/video/","/kalendar/","/diskuse/");
		$texty = array("Video","Kalendáø","Diskuse");
		$popisky = array("Zajímavá ¾onglérská videa","Kalendáø ¾onglérských akcí","Diskuse o ¾onglování");
	}

	if(isset($adresy)){
		$navrat="<ul>\n";
		for($foo=0;$foo<count($adresy);$foo++){
			if($_SERVER["REQUEST_URI"]==$adresy[$foo] and !isset($_GET["show"])){
				$navrat.="<li><strong>".$texty[$foo]."</strong></li>\n";
			}else{
				$navrat.="<li><a href=\"".$adresy[$foo]."\" title=\"".$popisky[$foo]."\">".$texty[$foo]."</a>\n";
			};
		};
		$navrat.="</ul>\n";
		return $navrat;
	}else{
		return "";
	}
}

?>
