<?php
require("hlavicka.inc");
$title="Balancov�n� ku�elu";
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
S ku�ely se nemus� jenom h�zet. M��e� je balancovat na brad�, nose, �pi�ce boty, ...
</p>

<p>
<? echo img("kuzely-balanca.png","Balancov�n� ku�elu na nose."); ?>
Postav si ku�el u���m koncem na �pi�ku nosu a udr�uj rovnov�hu.
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
