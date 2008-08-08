<?php
require("hlavicka.inc");
$title="Dva ku¾ely v jedné ruce";
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

<h3>Normální úchop</h3>
<p>
<? echo img("/zonglovani/img/kuzely-grip-normal.png","Normální úchop."); ?>
Vhodný pro zaèáteèníky. První ku¾el je nahoøe, pøekøí¾en doleva. První vyhodí¹ horní ku¾el.
</p>

<h3>Cirkusový úchop</h3>
<p>
<? echo img("/zonglovani/img/kuzely-grip-cirkus.png","Cirkusový úchop."); ?>
První ku¾el je dole, druhý nad ním smìøuje vpravo. První vyhodí¹ spodní ku¾el. Tento zaèátek je tì¾¹í - mù¾e¹ se snadno pra¹tit do nosu, ale pro nìkteré triky je prý lep¹í.
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
