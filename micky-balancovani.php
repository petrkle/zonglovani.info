<?php
require("hlavicka.inc");
$title="Balancov�n� m��ku";
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
Pou�ij pevn� kulat� m��ek.
</p>



<p>
<? echo img("balanca.png","Balancov�n� m��ku na hlav�."); ?>
Balancovat m��e� na vr�ku hlavy. M��ek pokl�dej na hlavu st��dav� levou a pravou rukou.
</p>


<p>
<? echo img("balancb.png","Balancov�n� m��ku na hlav�."); ?>
Balancov�n� m��ku s naklon�nou hlavou. Pro n�koho snaz��, pro n�koho naopak. Nejlep�� je zkusit oboje.
</p>


<p>
<? echo img("balancc.png","Balancov�n� m��ku na hlav�."); ?>
S m��kem na hlav� m��e� �onglovat.
</p>


<p>
<? echo img("balancd.png","Pirueta."); ?>
Pirueta s m��kem na hlav� - velmi obt�n�.
</p>


<p>
<? echo img("balance.png","Balancov�n� t�� m��k�."); ?>
V�born� tr�nink rovnov�hy.
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
