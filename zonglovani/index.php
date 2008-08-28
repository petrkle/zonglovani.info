<?php

if(eregi("index\.php$",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: .");
	exit();
}

require("utils.inc");
require("hlavicka.inc");
$title="®onglérùv slabikáø";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">

<div style="float: left; margin: 15px 15px 0 20px; text-align: center;">
<a href="/zonglovani/micky/" title="®onglování s míèky."><? echo img("micky.png","Míèky"); ?></a>
</div>


<div style="float: left; margin: 15px 15px 0 15px; text-align: center;">
<a href="/zonglovani/kruhy/" title="®onglování s kruhy."><? echo img("kruhy.png","Kruhy"); ?></a>
</div>


<div style="float: left; margin: 15px 0px 0 15px; text-align: center;">
<a href="/zonglovani/kuzely/" title="®onglování s ku¾ely."><? echo img("kuzely.png","Ku¾ely"); ?></a>
</div>

<p>
®onglérùv slabikáø je uèebnice ¾onglování se spoustou barevnıch obrázkù. Nejvìt¹í èást je vìnovaná míèkùm. Dozví¹ se také nìco málo o kruzích, ku¾elech a <a href="/zonglovani/chudy/" title="Chùdy">chùdách</a>.
</p>

<h3>Èím mám zaèít?</h3>

<p>Nejlehèí je <a href="/zonglovani/micky/3/kaskada.html" title="Kaskáda se tøemi míèky.">kaskáda s míèky</a>, vìt¹ina ¾onglérù se jí nauèí jako první. Ne¾ se do toho pustí¹, poctivì trénuj s <a href="/zonglovani/micky/jak-zacit.html#jeden" title="Úplnı základ.">jedním</a> a <a href="/zonglovani/micky/jak-zacit.html#dva" title="Úplnı základ.">dvìma</a> míèky.</p>

<ul>
<li><a href="/zonglovani/zakladni-pojmy.html" title="Základní pojmy v ¾onglování.">Základní pojmy</a> v ¾onglování.</li>
<li><a href="/zonglovani/nacini.html" title="Popis rùznıch ¾onglovátek.">®onglérské náèiní</a> - s èím v¹ím se dá ¾onglovat.</li>
<li><a href="/zonglovani/faq.html" title="FAQ">Èasto kladené otázky</a> a odpovìdi na nì.</li>
</ul>

<!-- obsah konec -->
</div>



<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>

<!-- menu konec -->
</div>

<!-- ramecek konec -->
</div>


<div class="spacer"></div>
<!-- stránka konec -->
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
