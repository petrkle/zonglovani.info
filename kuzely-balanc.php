<?php
require("hlavicka.inc");
$title="Balancování ku¾elu";
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
S ku¾ely se nemusí jenom házet. Mù¾e¹ je balancovat na bradì, nose, ¹pièce boty, ...
</p>

<p>
<? echo img("kuzely-balanca.png","Balancování ku¾elu na nose."); ?>
Postav si ku¾el u¾¹ím koncem na ¹pièku nosu a udr¾uj rovnováhu.
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
