<?php
function kruhy_menu($soubor){
$soubory = array("kruhy-2.php","kruhy-3.php","kruhy-4.php");
$adresy = array("kruhy/2/","kruhy/3/","kruhy/4/");

$texty = array("2 kruhy","3 kruhy","4 kruhy");

$popisky = array("�onglov�n� se dv�ma kruhy.","�onglov�n� se t�emi kruhy.","�onglov�n� se �ty�mi kruhy.");

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