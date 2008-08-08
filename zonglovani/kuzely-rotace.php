<?php
require("hlavicka.inc");
$title="Rotace ku�elu";
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
Z�kladn� zp�soby h�zen� ku�elu.
</p>

<a name="single"><h3>Jedna oto�ka</h3></a>
<p>
<? echo img("/zonglovani/img/kuzely-rotacea.png","1 oto�ka"); ?>
Ku�el se za letu jednou oto��. Z�kladn� a nejjednodu�� hod.
</p>


<a name="double"><h3>Dv� oto�ky</h3></a>
<p>
<? echo img("/zonglovani/img/kuzely-rotaceb.png","2 oto�ky"); ?>
Ku�el se za letu oto�� dvakr�t.
</p>

<a name="triple"><h3>T�i oto�ky</h3></a>
<p>
T�ko zvl�dnuteln�, ale m��e se hodit.
</p>

<h3>Reverzn� rotace</h3>
<p>
<? echo img("/zonglovani/img/kuzely-rotacec.png","Obr�cen�"); ?>
Ku�el m��e� hodit i s obr�cenou rotac�.
</p>

<h3>Flat</h3>
<p>
<? echo img("/zonglovani/img/kuzely-rotaced.png","Flat"); ?>
Neobvykl� hod - bez oto�en� ku�elu.
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
