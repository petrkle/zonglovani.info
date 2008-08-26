<?php
function kuzely_menu($soubor){
$soubory = array("kuzely-3.php","kuzely-passing.php");
$adresy = array("kuzely/3/","kuzely/passing/");

$texty = array("3 ku¾ely","Passing");

$popisky = array("®onglování se tøemi ku¾ely.","®onglování ve více lidech.");


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
