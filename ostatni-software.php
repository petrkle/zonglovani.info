<?php
require("hlavicka.inc");
$title="Simul�tory �onglov�n�";
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
Po��ta�ov� programy kter� po zad�n� triku v <a href="/siteswap.html" title="Z�pis �onglov�n� pomoc� ��sel.">siteswap</a> zobraz� animaci �onglov�n�.
</p>

<h3><a href="http://www.jongl.de" title="Simul�tor �onglov�n�." class="external" onclick="pageTracker._trackPageview('/goto/jongl.de');">Jongl</a></h3>
<p>
<a href="http://www.jongl.de" title="Jongl" onclick="pageTracker._trackPageview('/goto/jongl.de');"><? echo img("jongl.jpg","Jongl"); ?></a>
Simul�tor �onglov�n� kter� zvl�d� i <a href="/kuzely/passing/" title="�onglov�n� ve v�ce lidech.">passing</a>.
</p>

<h3><a href="http://www.koelnvention.de/software/index.html" title="JoePass" class="external" onclick="pageTracker._trackPageview('/goto/koelnvention.de');">JoePass</a></h3>
<p>
<a href="http://www.koelnvention.de/software/index.html" title="JoePass" onclick="pageTracker._trackPageview('/goto/koelnvention.de');"><? echo img("joepass.png","joepass"); ?></a>
Simul�tor �onglov�n� z n�mecka.
</p>

<h3><a href="http://juggleanim.sourceforge.net" title="Simul�tor napsan� v jav�." class="external" onclick="pageTracker._trackPageview('/goto/juggleanim.sourceforge.net');">JuggleAnim</a></h3>
<p>
<a href="http://juggleanim.sourceforge.net" title="Animace �onglov�n�." onclick="pageTracker._trackPageview('/goto/juggleanim.sourceforge.net');"><? echo img("juggleanim.png","JuggleAnim"); ?></a>
Simul�tor �onglov�n� napsan� v jav�.
</p>

<h3><a href="http://jugglinglab.sourceforge.net" title="Simul�tor napsan� v jav�." class="external" onclick="pageTracker._trackPageview('/goto/jugglinglab.sourceforge.net');">Juggling Lab</a></h3>
<p>
<a href="http://jugglinglab.sourceforge.net" title="Animace �onglov�n�." onclick="pageTracker._trackPageview('/goto/jugglinglab.sourceforge.net');"><? echo img("jugglinglab.png","Juggling Lab"); ?></a>
Juggling Lab je pokra�ovatel JuggleAnim.
</p>

<h3><a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spo�i� obrazovky pro X Window." class="external" onclick="pageTracker._trackPageview('/goto/tux.org');">xlockmore</a></h3>
<p>
<a href="http://www.tux.org/~bagleyd/xlockmore.html" title="Spo�i� obrazovky pro X Window." onclick="pageTracker._trackPageview('/goto/tux.org');"><? echo img("xlock.png","xlockmore"); ?></a>
Spo�i� obrazovky pro X&nbsp;Window.
</p>

<h3><a href="http://jugglemaster.net" title="Jugglemaster" class="external" onclick="pageTracker._trackPageview('/goto/Jugglemaster.net');">Jugglemaster</a></h3>
<p>
<a href="http://jugglemaster.net" title="Jugglemaster" onclick="pageTracker._trackPageview('/goto/Jugglemaster.net');"><? echo img("jugglemaster.png","jugglemaster"); ?></a>
Simul�tor �onglov�n� i pro kapesn� po��ta�e.
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
