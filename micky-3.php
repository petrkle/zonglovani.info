<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování se tøemi míèky";

if (array_key_exists("show", $_GET)) {
  $show="xml/".$_GET["show"];
};
if(!isset($show)){$show="";};

if(strlen($show)>0 and is_file($show.".xml")){
  // vykreslí jeden trik
  trik($show,__FILE__,$titulek);

}else{
  // kdy¾ není vybrán trik
hlavicka($titulek,__FILE__);
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">
<h1><? echo $titulek; ?></h1>

<h2>Èím zaèít?</h2>

<p>Nejlehèí trik se tøemi míèky je <a href="/micky/3/kaskada.html" title="Kaskáda se tøemi míèky.">kaskáda</a>, vìt¹ina ¾onglérù se ho nauèí jako první. Ne¾ se do toho pustí¹, poctivì trénuj s <a href="/micky/jak-zacit.html#jeden" title="Úplnı základ.">jedním</a> a <a href="/micky/jak-zacit.html#dva" title="Úplnı základ.">dvìma</a> míèky.</p>

<p>Asi druhı nejlehèí trik je <a href="/micky/3/kaskada-reverzni.html" title="Reverzní kaskáda se tøemi míèky.">reverzní kaskáda</a>. Jak název napovídá je to trochu pozmìnìná kaskáda.</p>

<p>Pokraèovat dál mù¾e¹ napøíklad s <a href="/micky/3/tenis.html" title="Dal¹í jednoduchı trik.">tenisem</a> nebo <a href="/micky/3/sloupy.html" title="Dal¹í jednoduchı trik.">sloupy</a>. Zále¾í ale jenom na tobì co nauèí¹ døív a co pozdìji. Není ¾ádné pevnì dané poøadí.</p>



<?php vypis_seznam(__FILE__);  ?>


<h2>Pro pokroèilé</h2>

<p>Nejznámìj¹í a pøitom docela obtí¾nı trik je <a href="/micky/3/sprcha.html" title="Obtí¾nìj¹í trik.">sprcha</a>. Pøi ní hází¹ míèky dokoleèka. Jedna ruka poøád vyhazuje a druhá chytá. Nauèit se to na obì strany u¾ zabere trochu èasu.</p>

<p>Triky jako <a href="/micky/3/blesk.html" title="Obtí¾nìj¹í trik.">blesk</a> nebo <a href="/micky/3/seesaw.html" title="Obtí¾nìj¹í trik.">see saw</a> vy¾adují rychlost, ale dají se zvládnout.</p>

<p>Velmi populární je také  <a href="/micky/3/mm.html" title="Velmi populární trik.">mills' mess</a>. Dej pozor, aby se ti nezapletly ruce. Jako trénink mù¾e¹ zkusit <a href="/micky/3/mm-falesne.html" title="Trik s køí¾ením rukou.">fale¹né mills' mess</a>, <a href="/micky/3/mlyn.html" title="Trik s køí¾ením rukou.">vìtrnı mlın</a> a <a href="/micky/3/zkrizene-ruce.html" title="Trik s køí¾ením rukou">reverzní kaskádu</a> se zkøí¾enıma rukama.</p>

</div>


<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>

<div class="spacer"></div>



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
