<?php
require("hlavicka.inc");
$title="Simulátory ¾onglování";
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
Poèítaèové programy které po zadání triku v <a href="/zonglovani/siteswap.html" title="Zápis ¾onglování pomocí èísel.">siteswap</a> zobrazí animaci ¾onglování.
</p>

<h3><a href="http://www.jongl.de" title="Simulátor ¾onglování.">Jongl</a></h3>
<p>
<a href="http://www.jongl.de" title="Jongl"><? echo img("jongl.jpg","Jongl"); ?></a>
Simulátor ¾onglování který zvládá i <a href="/zonglovani/kuzely/passing/" title="¾onglování ve více lidech.">passing</a>.
</p>

<h3><a href="http://juggleanim.sourceforge.net" title="Simulátor napsaný v javì.">JuggleAnim</a></h3>
<p>
<a href="http://juggleanim.sourceforge.net" title="Animace ¾onglování."><? echo img("juggleanim.png","JuggleAnim"); ?></a>
Simulátor ¾onglování napsaný v javì.
</p>

<h3><a href="http://jugglinglab.sourceforge.net" title="Simulátor napsaný v javì.">Juggling Lab</a></h3>
<p>
<a href="http://jugglinglab.sourceforge.net" title="Animace ¾onglování."><? echo img("jugglinglab.png","Juggling Lab"); ?></a>
Juggling Lab je pokraèovatel JuggleAnim.
</p>

<h3><a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spoøiè obrazovky pro X Window.">xlockmore</a></h3>
<p>
<a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spoøiè obrazovky pro X Window."><? echo img("xlock.png","xlockmore"); ?></a>
Spoøiè obrazovky pro X&nbsp;Window.
</p>

<h3><a href="http://jugglemaster.net" title="Jugglemaster">Jugglemaster</a></h3>
<p>
<a href="http://jugglemaster.net" title="Jugglemaster"><? echo img("jugglemaster.png","jugglemaster"); ?></a>
Simulátor ¾onglování i pro kapesní poèítaèe.
</p>

<!--
<h3><a href="http://www.smallsquare.co.uk/jsim.htm" title="Flash Juggling Simulator">JSIM Flash Juggling Simulator</a></h3>
<p>
Simulátor ¾onglování vytvoøený technologí flash.
</p>
-->

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
