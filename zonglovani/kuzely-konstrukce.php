<?php
require("hlavicka.inc");
$title="Konstrukce ku�elu";
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
<ol class="vp">
<li>hlava</li>
<li>t�lo</li>
<li>rukoje�</li>
<li>patka</li>
</ol>
</p>

<p>
<? echo img("/zonglovani/img/kuzel-konstrukce.png","Pr��ez ku�elem"); ?>
</p>


<p>
Uvnit� ku�elu je d�ev�n� ty�ka. Patka a hlava jsou k n� upevn�ny �roubem. Rukoje� je k t�lu ku�elu p�ichycena p�skou.
</p>

<p>
Kvalitn� ku�ely maj� "motanou" rukoje� kter� neprask�.
</p>

<p>
Hmotnost ku�elu se pohybuje mezi 200 a� 250 gramy.
</p>

<p>
Konkr�tn� n�zvy  ku�el�: piruette, classic, flip, delphin, radical fish, ...
</p>

<p>
<a href="vyroba.html" title="Ku�el z novin.">Jednoduch� ku�el</a> m��e� vyrobit sv�pomoc� z novin.
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
