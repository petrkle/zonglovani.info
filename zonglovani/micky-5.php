<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování s pìti míèky";

if (array_key_exists("show", $HTTP_GET_VARS)) {
  $show="xml/".$HTTP_GET_VARS["show"];
};
if(!isset($show)){$show="";};


if(strlen($show)>0 and is_file($show.".xml")){
  // vykreslí jeden trik

  trik($show,__FILE__,$titulek);

}else{
  // kdy¾ není vybrán trik
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


<h2>Èím zaèít?</h2>
<p>
Základní trik s pìti míèky je <a href="/zonglovani/micky/5/kaskada.html" title="Základ pro 5 míèkù.">kaskáda</a>. Sepsal jsem <a href="/zonglovani/micky/rady5.html" title="Tipy pro 5 míèkù.">nìkolik rad</a> pro ¾onglování s pìti míèky. Snad ti trochu pomohou. ®ádná zázraèná rada v¹ak není. Nauèit se ¾onglovat s pìti míèky trvá dlouho.
</p>

<?php  vypis_seznam(__FILE__);  ?>

<h2>A co dál?</h2>

<p>Kdy¾ ovládne¹ pìt míèkù, pak se mù¾e¹ soustøedit na <a href="/zonglovani/micky/3/3v1.html" title="Obtí¾nı trik se tøemi míèky.">3 v 1</a>. Odtud je u¾ jenom krùèek k fontánì s <a href="/zonglovani/micky/6/" title="®onglování s 6 míèky.">¹esti míèky</a>.</p>

<p>®onglování ov¹em není jenom o poètu. Zále¾í také na pøedmìtech se kterımi ¾ongluje¹. Tyto stránky se vìnují pouze tomu nejlehèímu -- míèkùm. Vìt¹ina popsanıch trikù se v¹ak dá obdobnì provádìt s ku¾ely, kruhy, pochodnìmi nebo dokonce no¾i.</p>

<p>
Pøedmìty se kterımi ¾ongluje¹ lze také libovolnì kombinovat. Napøíklad: kruh + míèek + ku¾el = parádní podívaná. Kdy¾ k jablku a míèku pøipojí¹ vidlièku, mù¾e¹ zakonèit vystoupení efektním napíchnutím jablka ve vzduchu.
</p>

<p>A nakonec je tøeba zmínit <a href="/zonglovani/micky/poslepu.html" title="®onglování poslepu.">¾onglování poslepu</a>. Mù¾e to znít neuvìøitelnì, ale jde to.</p>





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
