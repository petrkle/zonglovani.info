<?php

function cz2ascii($str){
  $trans = array("�" => "e","�" => "s","�" => "c","�" => "r","�" => "z","�" => "y","�" => "a","�" => "i","�" => "e","�" => "u","�" => "u","�" => "d","�" => "t","�" => "n","�" => "E","�" => "S","�" => "C","�" => "R","�" => "Z","�" => "Y","�" => "A","�" => "I","�" => "E","�" => "U","�" => "U","�" => "D","�" => "T","�" => "N"," " => "_","." => "", "-" => "");
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
<a href=\"/\" title=\"�vodn� str�nka serveru petrkle.wz.cz\">�vodn� str�nka</a> ~ <a href=\"/mapa-stranek.html\" title=\"Mapa str�nek petrkle.wz.cz\">Mapa str�nek</a> ~ <a href=\"/kontakt.html\" title=\"Kontakt\">Kontakt</a> ~ <a href=\"/pristupnost.html\" title=\"Prohl�en� o p��stupnosti.\">Prohl�en� o p��stupnosti</a>
</div>
</div>
</div>

<div class=\"spacer\"></div>
";

require($level."pocitadlo.inc");
echo pocitadlo();


};

?>