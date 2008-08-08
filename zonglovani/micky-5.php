<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="�onglov�n� s p�ti m��ky";

if (array_key_exists("show", $HTTP_GET_VARS)) {
  $show="xml/".$HTTP_GET_VARS["show"];
};
if(!isset($show)){$show="";};


if(strlen($show)>0 and is_file($show.".xml")){
  // vykresl� jeden trik

  trik($show,__FILE__,$titulek);

}else{
  // kdy� nen� vybr�n trik
hlavicka($titulek,__FILE__);
?>
<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">
<div id="ramecek">

<div id="obsah">
<h1><? echo $titulek; ?></h1>


<h2>��m za��t?</h2>
<p>
Z�kladn� trik s p�ti m��ky je <a href="/zonglovani/micky/5/kaskada.html" title="Z�klad pro 5 m��k�.">kask�da</a>. Sepsal jsem <a href="/zonglovani/micky/rady5.html" title="Tipy pro 5 m��k�.">n�kolik rad</a> pro �onglov�n� s p�ti m��ky. Snad ti trochu pomohou. ��dn� z�zra�n� rada v�ak nen�. Nau�it se �onglovat s p�ti m��ky trv� dlouho.
</p>

<?php  vypis_seznam(__FILE__);  ?>

<h2>A co d�l?</h2>

<p>Kdy� ovl�dne� p�t m��k�, pak se m��e� soust�edit na <a href="/zonglovani/micky/3/3v1.html" title="Obt�n� trik se t�emi m��ky.">3 v 1</a>. Odtud je u� jenom kr��ek k font�n� s <a href="/zonglovani/micky/6/" title="�onglov�n� s 6 m��ky.">�esti m��ky</a>.</p>

<p>�onglov�n� ov�em nen� jenom o po�tu. Z�le�� tak� na p�edm�tech se kter�mi �ongluje�. Tyto str�nky se v�nuj� pouze tomu nejleh��mu -- m��k�m. V�t�ina popsan�ch trik� se v�ak d� obdobn� prov�d�t s ku�ely, kruhy, pochodn�mi nebo dokonce no�i.</p>

<p>
P�edm�ty se kter�mi �ongluje� lze tak� libovoln� kombinovat. Nap��klad: kruh + m��ek + ku�el = par�dn� pod�van�. Kdy� k jablku a m��ku p�ipoj� vidli�ku, m��e� zakon�it vystoupen� efektn�m nap�chnut�m jablka ve vzduchu.
</p>

<p>A nakonec je t�eba zm�nit <a href="/zonglovani/micky/poslepu.html" title="�onglov�n� poslepu.">�onglov�n� poslepu</a>. M��e to zn�t neuv��iteln�, ale jde to.</p>





</div>


<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>

</div>



</div>
<div class="spacer"></div>
</div>
<?php
require("paticka.inc");
paticka($titulek);
?>

<?
};
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
