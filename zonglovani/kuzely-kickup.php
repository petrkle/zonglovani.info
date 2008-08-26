<?php
require("hlavicka.inc");
$title="Zvednutí ku¾elu nohou";
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
Neustálé shýbání pro spadlé ku¾ely se stane minulostí.
</p>

<p>
<? echo img("kuzely-kickupa.png","Ku¾el na nártu nohy."); ?>
Ku¾el si polo¾ ¹ikmo dr¾adlem pøes nárt pravé nohy.
</p>


<p>
<? echo img("kuzely-kickupb.png","Vykopnutí ku¾elu do vzduchu."); ?>
Vykopni nohou do strany. Ku¾el se opøe o holeò a nárt. Vyletí nahoru a mù¾e¹ pokraèovat v ¾onglování.
</p>

<p>
Obdobný postup mù¾e¹ pou¾ít pro <a href="/zonglovani/micky/kick-up.html" title="Zvednutí míèku nohou.">zvednutí míèku</a>.
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
