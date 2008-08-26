<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="Passing";

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

<p>
Pøedávání, více lidí ¾ongluje mezi sebou. Název vychází z angliètiny. Pass - pøedání.
</p>
<p>
<? echo img("kuzely-passing-introb.png","Passing s ku¾ely."); ?>
</p>
<p>
Královská disciplína ¾onglování. U¾ije¹ si pøi ní nejvíc legrace. Pro passing jsou nejlep¹í ku¾ely. 
</p>

<h3>Základy</h3>

<p>
<ul>
	<li><a href="pravidla.html" title="Jak se chovat pøi passování.">Pravidla passování</a></li>
	<li><a href="hody.html" title="Základní druhy hodù.">Druhy hodù</a></li>
	<li><a href="synchronizace.html" title="Jak zaèít stejnì.">Synchronizace</a> prvního hodu</li>
	<li><a href="pickup.html" title="®onglování bez pøeru¹ení.">Zvednutí spadlého ku¾elu</a></li>
</ul>
</p>

<h3>2 ¾ongléøi</h3>

<p>
<ul>
	<li><a href="4count.html" title="snadné">4 count</a> - základní trik</li>
	<li><a href="3count.html" title="snadné">3 count</a> - valèík</li>
	<li><a href="2count.html" title="snadné">2 count</a></li>
	<li><a href="runarounds.html" title="snadné">Obíhání</a></li>
	<li><a href="around.html" title="snadné">®onglování okolo èlovìka</a></li>
</ul>
</p>

<h3>2 ¾ongléøi - tì¾¹í triky</h3>

<p>
<ul>
	<li><a href="1count.html" title="tì¾¹í">1 count</a></li>
	<li><a href="pps.html" title="tì¾¹í">PPS - pass pass self</a></li>
	<li><a href="ps.html" title="tì¾¹í">PS - pass self</a></li>
	<li><a href="psspspps.html" title="tì¾¹í">Pass self self pass self pass pass self</a></li>
	<li><a href="all-hands.html" title="tì¾¹í">Passování do v¹ech rukou</a></li>
	<li><a href="7clubs.html" title="tì¾¹í">7 ku¾elù</a></li>
</ul>
</p>

<h3>Více ¾onglérù</h3>
<p>
<ul>
	<li><a href="feeds.html" title="snadné">Nabíjení</a></li>
	<li><a href="box.html" title="snadné">Ètverec</a></li>
	<li><a href="trojuhelnik.html" title="snadné">Trojúhelník</a></li>
	<li><a href="prebihani4z11k.html" title="tì¾¹í">Pøebíhání - 4 ¾ongléøi 11 ku¾elù</a></li>
	<li><a href="line.html" title="tì¾¹í">Øada</a></li>
	<li><a href="ypsilon.html" title="tì¾¹í">Ypsilon</a></li>
	<li><a href="bostoncircle.html" title="tì¾¹í">Boston circle</a></li>
	<li><a href="squares.html" title="tì¾¹í">Rotující ètverce</a></li>
	<li><a href="rypsilon.html" title="tì¾¹í">Rotující Y</a></li>
	<li><a href="star.html" title="tì¾¹í">Hvìzda</a></li>
	<li><a href="zip.html" title="tì¾¹í">Zip</a></li>
</ul>
</p>


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
