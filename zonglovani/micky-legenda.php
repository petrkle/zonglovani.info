<?php
require("hlavicka.inc");
$title="Vysvìtlivky k obrázkùm - míèky";
hlavicka($title,__FILE__);
?>




<?php
require("titulek.inc");
titulek(__FILE__);
?>




<div id="stranka">
<div id="ramecek">

<div id="obsah">


<h1>Vysvìtlivky k obrázkùm</h1>

<p>
Obrázky znázoròují jak házet míèky, jejich dráhu a naèasování. Ke ka¾dému obrázku patøí vysvìtlující text umístìný vpravo od nìj.
</p>

<h3>Míèky</h3>
<p>
<? echo img("legendaa.png","Druhy míèkù."); ?>
Míèky jsou rozli¹eny barvou a èíslicí.
</p>


<h3>Dráhy míèkù</h3>
<p>
<? echo img("legendab.png","Dráha míèku."); ?>
Dráha po které by míèek mìl letìt je vyznaèena pøeru¹ovanou èárou. ©ipka na konci urèuje smìr.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Pravá a levá ruka."); ?>
Pravá ruka je oznaèena písmenem P. Levá ruka písmenem L.
</p>

<h3>Pohyby rukou</h3>
<p>
<? echo img("legendad.png","Pohyb pravé ruky."); ?>
V nìkterých pøípadech je zvlá¹» zdùraznìn pohyb rukou. Pøeru¹ovaná èára s ¹ipkou vede od písemného oznaèení ruky.
</p>

<h3>Poloha tìla</h3>
<p>
<? echo img("legendae.png","Zvednuté koleno."); ?>
U slo¾itìj¹ích trikù je pro názornost nakreslen i obrys postavy.
</p>

<a href="#nahore" title="Pøesun na zaèátek stránky" class="nahoru">nahoru&nbsp;^^</a>

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
