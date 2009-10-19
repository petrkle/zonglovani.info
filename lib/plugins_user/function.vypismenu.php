<?php

function smarty_function_vypismenu($params, &$smarty){
	$adresy = array('/','/micky/','/kruhy/','/kuzely/','/ostatni.html');
	$texty = array('�vodn� str�nka','M��ky','Kruhy','Ku�ely','Ostatn�');
	$popis = array('�ongl�r�v slabik�� - �vodn� str�nka','Za��n�me s m��ky','Za��n�me s kruhy','Za��n�me s ku�ely','V�e ostatn� o �onglov�n�');

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

		if(!preg_match('/^\/ulita.*/',$_SERVER["REQUEST_URI"]) and $_SERVER["REQUEST_URI"]!='/'){
			$navrat.='<li><h4><a href="/ulita/" title="Ned�ln� �onglov�n� v DDM Ulita.">�onglov�n� v Ulit�</a></h4></li>';
		}

	$navrat.="\n<ul>\n";
			if(!preg_match(SEARCH_URL,$_SERVER["REQUEST_URI"])){
	$navrat.='<form action="'.SEARCH_URL.'" method="get" id="malehledani">
		<fieldset>
		<legend>Vyhled�v�n�</legend>
		<input type="text" name="query" class="policko" /><input type="submit" value="Naj�t" class="knoflik" />
		<input type="hidden" name="search" value="1" />
		</fieldset>
		</form>';
			}


	return $navrat;

}

function submenu($id){

	if($id==1){
		$adresy = array('/micky/2/','/micky/3/','/micky/4/','/micky/5/');
		$texty = array('2 m��ky','3 m��ky','4 m��ky','5 m��k�');
		$popisky = array('�onglov�n� se dv�ma m��ky.','�onglov�n� se t�emi m��ky.','�onglov�n� se �ty�mi m��ky.','�onglov�n� s p�ti m��ky.');
	}

	if($id==3){
		$adresy = array('/kuzely/3/','/kuzely/passing/');
		$texty = array('3 ku�ely','Passing');
		$popisky = array('�onglov�n� se t�emi ku�ely','�onglov�n� ve v�ce lidech');
	}

	if($id==4){
		$adresy = array('/obrazky/','/video/','/kalendar/','/diskuse/');
		$texty = array('Obr�zky','Video','Kalend��','Diskuse');
		$popisky = array('Obr�zky �onglov�n�','Zaj�mav� �ongl�rsk� videa','Kalend�� �ongl�rsk�ch akc�','Diskuse o �onglov�n�');
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
