<?php
require("hlavicka.inc");
require("utils.inc");

$titulek="�onglov�n� s �esti m��ky";

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
Tr�nuj <a href="/zonglovani/micky/3/3v1.html" title="t�ko provediteln� trik se t�emi m��ky.">3 v 1</a> pravou i levou rukou.
</p>

<h3>Font�na</h3>
<p>Z�kladn� trik se �esti m��ky.</p>
<p>
<? echo img("micky-6-fontanaa.png","Font�na se �esti m��ky."); ?>
H�zej pravou i levou rukou stejn� vysoko.
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
