<?php
require("hlavicka.inc");
$title="P�ekulen� ku�elky p�es hlavu";
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
Zn�m� t� pod anglick�m n�zvem <strong>headroll</strong>. Proveden� s ku�elkou je sna��� ne� stejn� trik s m��kem.
</p>

<p>
<? echo img("headrolla.png",""); ?>
P�ilo� si ku�elku k hlav� asi jako kdy� telefonuje�. Ku�elka je op�en� asi v polovin� dr�adla o bradu. Kone�ky prst� str� ku�elku proti hlav�.
</p>

<p>
<? echo img("headrollb.png",""); ?>
Ku�elka se ti p�ekul� p�es hlavu.
</p>

<p>
<? echo img("headrollc.png",""); ?>
Ku�elka se celou dobu dot�k� tv� hlavy.
</p>

<p>
<? echo img("headrolld.png",""); ?>
P�ekulen� ku�elky p�es hlavu je obt�n� trik. Jistotu z�sk� jedin� pravideln�m tr�ninkem.
</p>

<p>
<? echo img("headrolle.png",""); ?>
Na konci p�ekulen� chyt� ku�elku do lev� ruky.
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
