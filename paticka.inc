<?php

function cz2ascii($str){
  $trans = array("ì" => "e","¹" => "s","è" => "c","ø" => "r","¾" => "z","ý" => "y","á" => "a","í" => "i","é" => "e","ú" => "u","ù" => "u","ï" => "d","»" => "t","ò" => "n","Ì" => "E","©" => "S","È" => "C","Ø" => "R","®" => "Z","Ý" => "Y","Á" => "A","Í" => "I","É" => "E","Ú" => "U","Ù" => "U","Ï" => "D","«" => "T","Ò" => "N"," " => "_","." => "", "-" => "");
 $trans2 = array("__" => "_"); 
  $str = strtr($str, $trans);
  $str = strtr($str, $trans2);
  $str = strtolower($str);

  return $str;
};

function paticka($title,$soubor=""){
	$soubor=basename($soubor);
$navrat="
<div id=\"paticka\">
<div id=\"dolni\">
<div>";

if($soubor=="index.php"){$navrat.="<strong>zonglovani.info</strong>";}else{$navrat.="<a href=\"/\" title=\"Úvodní stránka\">Úvodní stránka</a>";}
$navrat.=" ~ ";
if($soubor=="ostatni-mapa-stranek.php"){$navrat.="<strong>Mapa stránek</strong>";}else{$navrat.="<a href=\"/mapa-stranek.html\" title=\"Mapa stránek zonglovani.info\">Mapa stránek</a>";}
$navrat.=" ~ ";
if($soubor=="ostatni-kontakt.php"){$navrat.="<strong>Kontakt</strong>";}else{$navrat.="<a href=\"/kontakt.html\" title=\"Kontakt\">Kontakt</a>";}
$navrat.=" ~ ";
if($soubor=="ostatni-pristupnost.php"){$navrat.="<strong>Prohlá¹ení o pøístupnosti</strong>";}else{$navrat.="<a href=\"/pristupnost.html\" title=\"Prohlá¹ení o pøístupnosti.\">Prohlá¹ení o pøístupnosti</a>";}

	$navrat.="
</div>
</div>
</div>

<div class=\"spacer\"></div>
";

print $navrat;
require("pocitadlo.inc");
echo pocitadlo();


};

?>
