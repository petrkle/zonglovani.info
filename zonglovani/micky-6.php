<?php
require("hlavicka.inc");
require("utils.inc");

$titulek="®onglování s ¹esti míèky";

hlavicka($titulek,__FILE__);
?>
<?php
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">
<div id="ramecek">

<div id="obsah">
<h1><? echo $titulek; ?></h1>

<p>
Trénuj <a href="/zonglovani/micky/3/3v1.html" title="tì¾ko proveditelný trik se tøemi míèky.">3 v 1</a> pravou i levou rukou.
</p>

<h3>Fontána</h3>
<p>Základní trik se ¹esti míèky.</p>
<p>
<? echo img("micky-6-fontanaa.png","Fontána se ¹esti míèky."); ?>
Házej pravou i levou rukou stejnì vysoko.
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
paticka($titulek);
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
