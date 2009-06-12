<?php
require("hlavicka.inc");
$title="Balancování míèku";
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
Pou¾ij pevný kulatý míèek.
</p>



<p>
<? echo img("balanca.png","Balancování míèku na hlavì."); ?>
Balancovat mù¾e¹ na vr¹ku hlavy. Míèek pokládej na hlavu støídavì levou a pravou rukou.
</p>


<p>
<? echo img("balancb.png","Balancování míèku na hlavì."); ?>
Balancování míèku s naklonìnou hlavou. Pro nìkoho snaz¹í, pro nìkoho naopak. Nejlep¹í je zkusit oboje.
</p>


<p>
<? echo img("balancc.png","Balancování míèku na hlavì."); ?>
S míèkem na hlavì mù¾e¹ ¾onglovat.
</p>


<p>
<? echo img("balancd.png","Pirueta."); ?>
Pirueta s míèkem na hlavì - velmi obtí¾né.
</p>


<p>
<? echo img("balance.png","Balancování tøí míèkù."); ?>
Výborný trénink rovnováhy.
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
