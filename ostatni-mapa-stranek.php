<?php
require("hlavicka.inc");
$title="Mapa stránek";
hlavicka($title,__FILE__);
?>


<?php
require("titulek.inc");
titulek(__FILE__);
?>


<div id="stranka">
<div id="ramecek">



<div id="obsah">

<div class="odstavec">

<h2><?=$title?></h2>
<?
include("mapa-stranek.inc");

?>

</div>
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
paticka($title,__FILE__);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
