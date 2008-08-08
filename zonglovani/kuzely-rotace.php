<?php
require("hlavicka.inc");
$title="Rotace ku¾elu";
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
Základní zpùsoby házení ku¾elu.
</p>

<a name="single"><h3>Jedna otoèka</h3></a>
<p>
<? echo img("/zonglovani/img/kuzely-rotacea.png","1 otoèka"); ?>
Ku¾el se za letu jednou otoèí. Základní a nejjednodu¹í hod.
</p>


<a name="double"><h3>Dvì otoèky</h3></a>
<p>
<? echo img("/zonglovani/img/kuzely-rotaceb.png","2 otoèky"); ?>
Ku¾el se za letu otoèí dvakrát.
</p>

<a name="triple"><h3>Tøi otoèky</h3></a>
<p>
Tì¾ko zvládnutelné, ale mù¾e se hodit.
</p>

<h3>Reverzní rotace</h3>
<p>
<? echo img("/zonglovani/img/kuzely-rotacec.png","Obrácenì"); ?>
Ku¾el mù¾e¹ hodit i s obrácenou rotací.
</p>

<h3>Flat</h3>
<p>
<? echo img("/zonglovani/img/kuzely-rotaced.png","Flat"); ?>
Neobvyklý hod - bez otoèení ku¾elu.
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
