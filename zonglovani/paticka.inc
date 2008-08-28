<?php

function cz2ascii($str){
  $trans = array("ì" => "e","¹" => "s","è" => "c","ø" => "r","¾" => "z","ı" => "y","á" => "a","í" => "i","é" => "e","ú" => "u","ù" => "u","ï" => "d","»" => "t","ò" => "n","Ì" => "E","©" => "S","È" => "C","Ø" => "R","®" => "Z","İ" => "Y","Á" => "A","Í" => "I","É" => "E","Ú" => "U","Ù" => "U","Ï" => "D","«" => "T","Ò" => "N"," " => "_","." => "", "-" => "");
 $trans2 = array("__" => "_"); 
  $str = strtr($str, $trans);
  $str = strtr($str, $trans2);
  $str = strtolower($str);

  return $str;
};

function paticka($title,$level="../"){
echo"
<div id=\"paticka\">
<div id=\"dolni\">
<div>
<a href=\"/mapa-stranek.html\" title=\"Mapa stránek petrkle.wz.cz\">Mapa stránek</a> ~ <a href=\"/kontakt.html\" title=\"Kontakt\">Kontakt</a> ~ <a href=\"/pristupnost.html\" title=\"Prohlá¹ení o pøístupnosti.\">Prohlá¹ení o pøístupnosti</a>
</div>
</div>
</div>

<div class=\"spacer\"></div>
";

require($level."pocitadlo.inc");
echo pocitadlo();


};

?>
