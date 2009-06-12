<?php
require("hlavicka.inc");
$title="Vysvìtlivky k obrázkùm - ku¾ely";
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
Obrázky znázoròují jak házet ku¾ely, jejich dráhu a naèasování. Ke ka¾dému obrázku patøí vysvìtlující text umístìný vpravo od nìj.
</p>

<h3>Ku¾ely</h3>
<p>
<? echo img("kuzely-legendaa.png","Druhy ku¾elù."); ?>
Ku¾ely jsou rozli¹eny barvou a èíslicí.
</p>


<h3>Dráhy ku¾elu</h3>
<p>
<? echo img("kuzely-legendab.png","Dráha ku¾elu."); ?>
Dráha po které by ku¾el mìl letìt je vyznaèena pøeru¹ovanou èárou. ©ipka na konci urèuje smìr.
</p>

<h3>Ruce</h3>
<p>
<? echo img("legendac.png","Pravá a levá ruka."); ?>
Pravá ruka je oznaèena písmenem P. Levá ruka písmenem L.
</p>


<h3><a href="/kuzely/passing/" title="®onglování ve více lidech">Passing</a></h3>
<p>
<? echo img("kuzely-legendad.png","Passing."); ?>
Zobrazení polohy ¾onglérù pøi passování. Pohled shora. Èerné pøeru¹ované ¹ipky znaèí dráhu ku¾elù. Èervená plná ¹ipka zobrazuje pøesun ¾ongléra.
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
