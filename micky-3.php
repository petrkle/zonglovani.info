<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="�onglov�n� se t�emi m��ky";

if (array_key_exists("show", $_GET)) {
  $show="xml/".$_GET["show"];
};
if(!isset($show)){$show="";};

if(strlen($show)>0 and is_file($show.".xml")){
  // vykresl� jeden trik
  trik($show,__FILE__,$titulek);

}else{
  // kdy� nen� vybr�n trik
hlavicka($titulek,__FILE__);
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">
<h1><? echo $titulek; ?></h1>

<h2>��m za��t?</h2>

<p>Nejleh�� trik se t�emi m��ky je <a href="/micky/3/kaskada.html" title="Kask�da se t�emi m��ky.">kask�da</a>, v�t�ina �ongl�r� se ho nau�� jako prvn�. Ne� se do toho pust�, poctiv� tr�nuj s <a href="/micky/jak-zacit.html#jeden" title="�pln� z�klad.">jedn�m</a> a <a href="/micky/jak-zacit.html#dva" title="�pln� z�klad.">dv�ma</a> m��ky.</p>

<p>Asi druh� nejleh�� trik je <a href="/micky/3/kaskada-reverzni.html" title="Reverzn� kask�da se t�emi m��ky.">reverzn� kask�da</a>. Jak n�zev napov�d� je to trochu pozm�n�n� kask�da.</p>

<p>Pokra�ovat d�l m��e� nap��klad s <a href="/micky/3/tenis.html" title="Dal�� jednoduch� trik.">tenisem</a> nebo <a href="/micky/3/sloupy.html" title="Dal�� jednoduch� trik.">sloupy</a>. Z�le�� ale jenom na tob� co nau�� d��v a co pozd�ji. Nen� ��dn� pevn� dan� po�ad�.</p>



<?php vypis_seznam(__FILE__);  ?>


<h2>Pro pokro�il�</h2>

<p>Nejzn�m�j�� a p�itom docela obt�n� trik je <a href="/micky/3/sprcha.html" title="Obt�n�j�� trik.">sprcha</a>. P�i n� h�z� m��ky dokole�ka. Jedna ruka po��d vyhazuje a druh� chyt�. Nau�it se to na ob� strany u� zabere trochu �asu.</p>

<p>Triky jako <a href="/micky/3/blesk.html" title="Obt�n�j�� trik.">blesk</a> nebo <a href="/micky/3/seesaw.html" title="Obt�n�j�� trik.">see saw</a> vy�aduj� rychlost, ale daj� se zvl�dnout.</p>

<p>Velmi popul�rn� je tak�  <a href="/micky/3/mm.html" title="Velmi popul�rn� trik.">mills' mess</a>. Dej pozor, aby se ti nezapletly ruce. Jako tr�nink m��e� zkusit <a href="/micky/3/mm-falesne.html" title="Trik s k��en�m rukou.">fale�n� mills' mess</a>, <a href="/micky/3/mlyn.html" title="Trik s k��en�m rukou.">v�trn� ml�n</a> a <a href="/micky/3/zkrizene-ruce.html" title="Trik s k��en�m rukou">reverzn� kask�du</a> se zk��en�ma rukama.</p>

</div>


<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>

<div class="spacer"></div>



</div>



</div>


<div class="spacer"></div>
</div>


<?php
require("paticka.inc");
paticka($titulek);
?>

<?
};
?>

<!-- start -->
<div class="reklama">

<!--WZ-REKLAMA-1.0-STRICT-->

</div>
<!-- stop -->

</body>
</html>
