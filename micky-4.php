<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování se ètyømi míèky";

if (array_key_exists("show", $_GET)) {
  $show="xml/".$_GET["show"];
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

<h2>Èím zaèít?</h2>



<p>Nejlehèí trik se ètyømi míèky je <a href="/micky/4/fontana.html" title="Nejlehèí trik se ètyømi míèky.">fontána</a>. Relativnì snadné jsou té¾ <a href="/micky/4/sloupy.html" title="Trik se ètyømi míèky.">sloupy</a> nebo <a href="/micky/4/fontana-synchronni.html" title="Trik se ètyømi míèky.">synchronní fontána</a>.</p>


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
