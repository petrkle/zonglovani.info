<?php
require("hlavicka.inc");
$title="Kontakt";
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
<h1><?=$title?></h1>
<br />
<br />
<h3>Petr Kleteèka</h3>
<p class="kontakt">
Elektronická po¹ta: kletecka<img src="img/zavinac.png" width="20" height="20" alt="@" style="vertical-align: bottom" />email<img src="img/tecka.png" width="5" height="20" alt="." style="vertical-align: bottom" />cz
</p>


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
