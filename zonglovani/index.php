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

<p>
®onglérùv slabikáø je uèebnice ¾onglování se spoustou barevných obrázkù.
</p>

<h3><a href="/zonglovani/micky/" title="®onglování s míèky.">®onglování s míèky</a></h3>
<p>
<a href="/zonglovani/micky/" title="®onglování s míèky."><? echo img("intro-micky.png","Míèky"); ?></a>
<a href="/zonglovani/micky/jak-zacit.html" title="Jak zaèít ¾onglovat s míèky.">První trik</a> se tøemi míèky zvládne¹ za jedno odpoledne. Vyber si <a href="micky/druhy.html" title="Druhy míèkù pro ¾onglování">správný míèek</a> a zaèni <a href="trenink.html" title="Rady pro trénkink.">trénovat</a> hned teï.
</p>

<h3><a href="/zonglovani/kuzely/" title="®onglování s ku¾ely.">®onglování s ku¾ely</a></h3>
<p>
<a href="/zonglovani/kuzely/" title="®onglování s ku¾ely."><? echo img("intro-kuzely.png","Ku¾ely"); ?></a>
<a href="/zonglovani/kuzely/jak-zacit.html" title="Jak zaèít ¾onglovat s ku¾ely.">Zaèít ¾onglovat s ku¾ely</a> je trochu tì¾¹í ne¾ s míèky. Odmìnou ti bude úplnì nový pohled na ¾onglování. 
</p>

<h3><a href="/zonglovani/kuzely/passing/" title="®onglování ve více lidech.">Passing</a> - ¾onglování ve více lidech</h3>
<p>
<a href="/zonglovani/kuzely/passing/" title="®onglování ve více lidech."><? echo img("intro-passing.png","Passing"); ?></a>
Královská disciplína ¾onglování. U¾ije¹ si pøi ní nejvíc legrace.
</p>

<h3>Dal¹í informace o ¾onglování</h3>
<p>
<ul>
<li><a href="/zonglovani/zakladni-pojmy.html" title="Základní pojmy v ¾onglování.">Základní pojmy</a> v ¾onglování.</li>
<li><a href="/zonglovani/nacini.html" title="Popis rùzných ¾onglovátek.">®onglérské náèiní</a> - s èím v¹ím se dá ¾onglovat.</li>
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
