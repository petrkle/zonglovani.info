<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování se dvìma míèky";

if (array_key_exists("show", $HTTP_GET_VARS)) {
  $show="xml/".$HTTP_GET_VARS["show"];
};
if(!isset($show)){$show="";};


if(strlen($show)>0 and is_file($show.".xml")){
  // vykreslí jeden trik

  trik($show,__FILE__,$titulek);

}else{
  // kdy¾ není vybrán trik
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

<h1>Èím zaèít?</h1>

<p>Nejlehèí trik se dvìma míèky je <a href="/zonglovani/micky/2/2v1.html" title="Nejlehèí trik se dvìma míèky.">2 v 1</a> (dva míèky v jedné ruce).</p>

<p>2 v 1 by nemìla bıt úplnì první vìc, kterou se s míèky nauèí¹. Je lep¹í zaèít s <a href="/zonglovani/micky/jak-zacit.html#jeden" title="Úplnı základ.">jedním</a> a <a href="/zonglovani/micky/jak-zacit.html#dva" title="Úplnı základ.">dvìma</a> míèky a¾ se dopracuje¹ ke <a href="/zonglovani/micky/3/kaskada.html" title="Nejlehèí trik s míèky.">kaskádì</a> s tøemi míèky. Potom je èas vrátit se ke dvìma míèkùm. Zvládne¹ je snadnìji a bude¹ moct rovnou pøeskoèit ke <a href="/zonglovani/micky/4/" title="Triky se ètyømi míèky.">ètyøem</a> míèkùm.</p>

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
