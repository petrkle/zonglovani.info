<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="�onglov�n� se dv�ma m��ky";

if (array_key_exists("show", $HTTP_GET_VARS)) {
  $show="xml/".$HTTP_GET_VARS["show"];
};
if(!isset($show)){$show="";};


if(strlen($show)>0 and is_file($show.".xml")){
  // vykresl� jeden trik

  trik($show,__FILE__,$titulek);

}else{
  // kdy� nen� vybr�n trik
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

<?php  vypis_seznam(__FILE__);  ?>

<h1>��m za��t?</h1>

<p>Nejleh�� trik se dv�ma m��ky je <a href="/zonglovani/micky/2/2v1.html" title="Nejleh�� trik se dv�ma m��ky.">2 v 1</a> (dva m��ky v jedn� ruce).</p>

<p>2 v 1 by nem�la b�t �pln� prvn� v�c, kterou se s m��ky nau��. Je lep�� za��t s <a href="/zonglovani/micky/jak-zacit.html#jeden" title="�pln� z�klad.">jedn�m</a> a <a href="/zonglovani/micky/jak-zacit.html#dva" title="�pln� z�klad.">dv�ma</a> m��ky a� se dopracuje� ke <a href="/zonglovani/micky/3/kaskada.html" title="Nejleh�� trik s m��ky.">kask�d�</a> s t�emi m��ky. Potom je �as vr�tit se ke dv�ma m��k�m. Zvl�dne� je snadn�ji a bude� moct rovnou p�esko�it ke <a href="/zonglovani/micky/4/" title="Triky se �ty�mi m��ky.">�ty�em</a> m��k�m.</p>

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
