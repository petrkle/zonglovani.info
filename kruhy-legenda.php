<?php
require("hlavicka.inc");
$title="Vysvìtlivky k obrázkùm - kruhy";
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
Obrázky znázoròují jak házet kruhy, jejich dráhu a naèasování. Ke ka¾dému obrázku patøí vysvìtlující text umístìný vpravo od nìj.
</p>

<h3>Kruhy</h3>
<p>
<? echo img("kruhy-legendaa.png","Druhy kruhù."); ?>
Kruhy jsou rozli¹eny barvou a èíslicí.
</p>


<h3>Dráhy kruhù</h3>
<p>
<? echo img("legendab.png","Dráha kruhu."); ?>
Dráha po které by kruh mìl letìt je vyznaèena pøeru¹ovanou èárou. ©ipka na konci urèuje smìr.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Pravá a levá ruka."); ?>
Pravá ruka je oznaèena písmenem P. Levá ruka písmenem L.
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
