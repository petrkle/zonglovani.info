<?php
require("hlavicka.inc");
$title="Dva ku�ely v jedn� ruce";
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

<h3>Norm�ln� �chop</h3>
<p>
<? echo img("/zonglovani/img/kuzely-grip-normal.png","Norm�ln� �chop."); ?>
Vhodn� pro za��te�n�ky. Prvn� ku�el je naho�e, p�ek��en doleva. Prvn� vyhod� horn� ku�el.
</p>

<h3>Cirkusov� �chop</h3>
<p>
<? echo img("/zonglovani/img/kuzely-grip-cirkus.png","Cirkusov� �chop."); ?>
Prvn� ku�el je dole, druh� nad n�m sm��uje vpravo. Prvn� vyhod� spodn� ku�el. Tento za��tek je t쾹� - m��e� se snadno pra�tit do nosu, ale pro n�kter� triky je pr� lep��.
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
