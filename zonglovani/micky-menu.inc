<?php

function micky_menu($soubor){
	$soubory = array("micky-2.php","micky-3.php","micky-4.php","micky-5.php");
	$adresy = array("micky/2/","micky/3/","micky/4/","micky/5/");

	$texty = array("2 m��ky","3 m��ky","4 m��ky","5 m��k�");

	$popisky = array("�onglov�n� se dv�ma m��ky.","�onglov�n� se t�emi m��ky.","�onglov�n� se �ty�mi m��ky.","�onglov�n� s p�ti m��ky.");

	echo "<ul>";
	for($i=0;$i<count($adresy);$i++){
		if($soubor==$soubory[$i] and !isset($_GET["show"])){
			echo("\n<li><strong>".$texty[$i]."</strong></li>");
		}else{
			echo("\n<li><a href=\"/zonglovani/".$adresy[$i]."\" title=\"".$popisky[$i]."\">".$texty[$i]."</a></li>");
		};
	};
	echo "</ul>";
};

?>