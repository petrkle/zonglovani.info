<?php
require("hlavicka.inc");
$title="Pøekulení ku¾elky pøes hlavu";
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
Známé té¾ pod anglickým názvem <strong>headroll</strong>. Provedení s ku¾elkou je sna¾¹í ne¾ stejný trik s míèkem.
</p>

<p>
<? echo img("headrolla.png",""); ?>
Pøilo¾ si ku¾elku k hlavì asi jako kdy¾ telefonuje¹. Ku¾elka je opøená asi v polovinì dr¾adla o bradu. Koneèky prstù strè ku¾elku proti hlavì.
</p>

<p>
<? echo img("headrollb.png",""); ?>
Ku¾elka se ti pøekulí pøes hlavu.
</p>

<p>
<? echo img("headrollc.png",""); ?>
Ku¾elka se celou dobu dotýká tvé hlavy.
</p>

<p>
<? echo img("headrolld.png",""); ?>
Pøekulení ku¾elky pøes hlavu je obtí¾ný trik. Jistotu získá¹ jedinì pravidelným tréninkem.
</p>

<p>
<? echo img("headrolle.png",""); ?>
Na konci pøekulení chytí¹ ku¾elku do levé ruky.
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
