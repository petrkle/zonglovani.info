<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="�onglov�n� se �ty�mi m��ky";

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

<h2>��m za��t?</h2>



<p>Nejleh�� trik se �ty�mi m��ky je <a href="/micky/4/fontana.html" title="Nejleh�� trik se �ty�mi m��ky.">font�na</a>. Relativn� snadn� jsou t� <a href="/micky/4/sloupy.html" title="Trik se �ty�mi m��ky.">sloupy</a> nebo <a href="/micky/4/fontana-synchronni.html" title="Trik se �ty�mi m��ky.">synchronn� font�na</a>.</p>


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
