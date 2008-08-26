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

<p>
P�ed�v�n�, v�ce lid� �ongluje mezi sebou. N�zev vych�z� z angli�tiny. Pass - p�ed�n�.
</p>
<p>
<? echo img("kuzely-passing-introb.png","Passing s ku�ely."); ?>
</p>
<p>
Kr�lovsk� discipl�na �onglov�n�. U�ije� si p�i n� nejv�c legrace. Pro passing jsou nejlep�� ku�ely. 
</p>

<h3>Z�klady</h3>

<p>
<ul>
	<li><a href="pravidla.html" title="Jak se chovat p�i passov�n�.">Pravidla passov�n�</a></li>
	<li><a href="hody.html" title="Z�kladn� druhy hod�.">Druhy hod�</a></li>
	<li><a href="synchronizace.html" title="Jak za��t stejn�.">Synchronizace</a> prvn�ho hodu</li>
	<li><a href="pickup.html" title="�onglov�n� bez p�eru�en�.">Zvednut� spadl�ho ku�elu</a></li>
</ul>
</p>

<h3>2 �ongl��i</h3>

<p>
<ul>
	<li><a href="4count.html" title="snadn�">4 count</a> - z�kladn� trik</li>
	<li><a href="3count.html" title="snadn�">3 count</a> - val��k</li>
	<li><a href="2count.html" title="snadn�">2 count</a></li>
	<li><a href="runarounds.html" title="snadn�">Ob�h�n�</a></li>
	<li><a href="around.html" title="snadn�">�onglov�n� okolo �lov�ka</a></li>
</ul>
</p>

<h3>2 �ongl��i - t쾹� triky</h3>

<p>
<ul>
	<li><a href="1count.html" title="t쾹�">1 count</a></li>
	<li><a href="pps.html" title="t쾹�">PPS - pass pass self</a></li>
	<li><a href="ps.html" title="t쾹�">PS - pass self</a></li>
	<li><a href="psspspps.html" title="t쾹�">Pass self self pass self pass pass self</a></li>
	<li><a href="all-hands.html" title="t쾹�">Passov�n� do v�ech rukou</a></li>
	<li><a href="7clubs.html" title="t쾹�">7 ku�el�</a></li>
</ul>
</p>

<h3>V�ce �ongl�r�</h3>
<p>
<ul>
	<li><a href="feeds.html" title="snadn�">Nab�jen�</a></li>
	<li><a href="box.html" title="snadn�">�tverec</a></li>
	<li><a href="trojuhelnik.html" title="snadn�">Troj�heln�k</a></li>
	<li><a href="prebihani4z11k.html" title="t쾹�">P�eb�h�n� - 4 �ongl��i 11 ku�el�</a></li>
	<li><a href="line.html" title="t쾹�">�ada</a></li>
	<li><a href="ypsilon.html" title="t쾹�">Ypsilon</a></li>
	<li><a href="bostoncircle.html" title="t쾹�">Boston circle</a></li>
	<li><a href="squares.html" title="t쾹�">Rotuj�c� �tverce</a></li>
	<li><a href="rypsilon.html" title="t쾹�">Rotuj�c� Y</a></li>
	<li><a href="star.html" title="t쾹�">Hv�zda</a></li>
	<li><a href="zip.html" title="t쾹�">Zip</a></li>
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
