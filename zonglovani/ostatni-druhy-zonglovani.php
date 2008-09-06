<?php
require("hlavicka.inc");
$title="Druhy ¾onglování";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">


<div id="obsah">
<h1><?=$title?></h1>

<p>
Základní pøehled zpùsobù ¾onglování. Nejedná se o úplný nebo pøesný seznam. Jde jen o naznaèení jak mù¾e¹ ¾onglovat. S èím v¹ím mù¾e¹ ¾onglovat se dozví¹ v <a href="/zonglovani/nacini.html" title="®ognlérské náèiní.">pøehledu ¾onglérských pomùcek</a>.
</p>

<h3>Házení do vzduchu</h3>
<p>
<?=img("nacinia.png","");?>
Pøedmìty vyhazuje¹ vzjùru a ony se pùsobením gravitaèní síly vrací zpìt.
</p>

<h3>Kontaktní ¾onglování</h3>
<p>
<?=img("druhyb.png","");?>
Pøedmìty si kutálí¹ po tìle. Vìt¹inou se pou¾ívají míèky.
</p>


<h3><a href="/zonglovani/kuzely/passing/" title="®onglování ve více lidech.">Passing</a></h3>
<p>
<a href="/zonglovani/kuzely/passing/" title="®onglování ve více lidech."><?=img("druhyc.png","");?></a>
®onglování ve více lidech. Pro passing jsou ideální ku¾ely.
</p>

<h3>®onglování se skákacími míèky</h3>
<p>
<?=img("druhyd.png","");?>
Míèky nehází¹ nahoru, ale odrá¾í¹ od podlahy.
</p>

<h3>Fireshow</h3>
<p>
<?=img("druhye.png","");?>
®onglování s ohnìm. Existují <a href="/zonglovani/kuzely/ohen.html" title="®onglování s ohnìm.">ohnivé ku¾ely</a>, tyèe, poi-poi a vìjíøe. Oheò se dá i plivat, ale to je velmi nebezpeèné.
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
paticka($title);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
