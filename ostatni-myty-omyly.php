<?php
require("hlavicka.inc");
$title="Mýty a omyly";
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

<h3>®onglování zvìt¹uje mozek</h3>
<p>
<?=img("mytya.png","");?>
Typická zpráva okurkové sezony.
</p>


<h3>Kdy¾ si stoupnu pøed zeï, pøestanu házet míèky pøíli¹ dopøedu</h3>
<p>
<?=img("mytyb.png","");?>
Zaèínající ¾ongléøi èasto hází míèky dopøedu. Stát èelem ke zdi ale nikomu nepomù¾e.
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
