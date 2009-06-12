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
Poèítaèové programy které po zadání triku v <a href="/siteswap.html" title="Zápis ¾onglování pomocí èísel.">siteswap</a> zobrazí animaci ¾onglování.
</p>

<h3><a href="http://www.jongl.de" title="Simulátor ¾onglování." class="external" onclick="pageTracker._trackPageview('/goto/jongl.de');">Jongl</a></h3>
<p>
<a href="http://www.jongl.de" title="Jongl" onclick="pageTracker._trackPageview('/goto/jongl.de');"><? echo img("jongl.jpg","Jongl"); ?></a>
Simulátor ¾onglování který zvládá i <a href="/kuzely/passing/" title="¾onglování ve více lidech.">passing</a>.
</p>

<h3><a href="http://www.koelnvention.de/software/index.html" title="JoePass" class="external" onclick="pageTracker._trackPageview('/goto/koelnvention.de');">JoePass</a></h3>
<p>
<a href="http://www.koelnvention.de/software/index.html" title="JoePass" onclick="pageTracker._trackPageview('/goto/koelnvention.de');"><? echo img("joepass.png","joepass"); ?></a>
Simulátor ¾onglování z nìmecka.
</p>

<h3><a href="http://juggleanim.sourceforge.net" title="Simulátor napsaný v javì." class="external" onclick="pageTracker._trackPageview('/goto/juggleanim.sourceforge.net');">JuggleAnim</a></h3>
<p>
<a href="http://juggleanim.sourceforge.net" title="Animace ¾onglování." onclick="pageTracker._trackPageview('/goto/juggleanim.sourceforge.net');"><? echo img("juggleanim.png","JuggleAnim"); ?></a>
Simulátor ¾onglování napsaný v javì.
</p>

<h3><a href="http://jugglinglab.sourceforge.net" title="Simulátor napsaný v javì." class="external" onclick="pageTracker._trackPageview('/goto/jugglinglab.sourceforge.net');">Juggling Lab</a></h3>
<p>
<a href="http://jugglinglab.sourceforge.net" title="Animace ¾onglování." onclick="pageTracker._trackPageview('/goto/jugglinglab.sourceforge.net');"><? echo img("jugglinglab.png","Juggling Lab"); ?></a>
Juggling Lab je pokraèovatel JuggleAnim.
</p>

<h3><a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spoøiè obrazovky pro X Window." class="external" onclick="pageTracker._trackPageview('/goto/tux.org');">xlockmore</a></h3>
<p>
<a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spoøiè obrazovky pro X Window." onclick="pageTracker._trackPageview('/goto/tux.org');"><? echo img("xlock.png","xlockmore"); ?></a>
Spoøiè obrazovky pro X&nbsp;Window.
</p>

<h3><a href="http://jugglemaster.net" title="Jugglemaster" class="external" onclick="pageTracker._trackPageview('/goto/Jugglemaster.net');">Jugglemaster</a></h3>
<p>
<a href="http://jugglemaster.net" title="Jugglemaster" onclick="pageTracker._trackPageview('/goto/Jugglemaster.net');"><? echo img("jugglemaster.png","jugglemaster"); ?></a>
Simulátor ¾onglování i pro kapesní poèítaèe.
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
