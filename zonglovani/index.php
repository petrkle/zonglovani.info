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
®onglérùv slabikáø je uèebnice ¾onglování se spoustou barevných obrázkù. Nejvìt¹í èást je vìnovaná míèkùm. Dozví¹ se také nìco málo o kruzích, ku¾elech a <a href="/zonglovani/chudy/" title="Chùdy">chùdách</a>.
</p>

<h3>Èím mám zaèít?</h3>

<p>Nejlehèí je zaèít <a href="/zonglovani/micky/jak-zacit.html" title="Základní návod.">¾onglovat s míèky</a>.</p>

<h3>Dal¹í informace o ¾onglování</h3>
<p>
<ul>
<li><a href="/zonglovani/nacini.html" title="Popis rùzných ¾onglovátek.">®onglérské náèiní</a> - s èím v¹ím se dá ¾onglovat.</li>
<li><a href="/zonglovani/druhy-zonglovani.html" title="Popis zpùsobù ¾onglování.">Druhy ¾onglování</a> - rùzné zpùsoby ¾onglovaní.</li>
<li><a href="/zonglovani/faq.html" title="FAQ">Èasto kladené otázky</a> a odpovìdi na nì.</li>
</ul>
</p>

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
