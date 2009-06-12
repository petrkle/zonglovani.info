<?php
require("hlavicka.inc");
$title="®onglování - základní pojmy";
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

<h3>®onglér</h3>
<p>
<? echo img("zongler.png","®onglér"); ?>
S okouzlující lehkostí pøedvádí neuvìøitelné kousky. Usmívá se a v¹echy pobaví.
</p>

<h3><a href="/micky/3/kaskada.html" title="Návod pro 3 míèky.">Kaskáda</a></h3>
<p>
<a href="/micky/3/kaskada.html" title="Návod pro 3 míèky."><? echo img("help-kaskada.png","Kaskáda"); ?></a>
Nejsnadnìj¹í zpùsob ¾onglování. ¾ongluje se s lichým poètem pøedmìtù - 3, 5, 7, .... Støídavì hází pravá a levá ruka.
</p>

<h3><a href="/micky/3/sprcha.html" title="Návod pro 3 míèky.">Sprcha</a></h3>
<p>
<a href="/micky/3/sprcha.html" title="Návod pro 3 míèky."><? echo img("help-sprcha.png","Sprcha"); ?></a>
¾onglování dokoleèka. Jedna ruka hází vrchem, druhá chytá a hází spodem. Mo¾né s lichým i sudým poètem pøedmìtù.
</p>

<h3><a href="/micky/4/fontana.html" title="Návod pro 4 míèky.">Fontána</a></h3>
<p>
<a href="/micky/4/fontana.html" title="Návod pro 4 míèky."><? echo img("help-fontana.png","Fontána"); ?></a>
®onglování se sudým poètem pøedmìtù - 4, 6, 8, .... V ka¾dé ruce polovina.
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
