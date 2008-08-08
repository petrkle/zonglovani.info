<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování se tøemi kruhy";

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
require("titulek.inc");
titulek(__FILE__);
?>

<div id="stranka">

<div id="ramecek">

<div id="obsah">
<h1><? echo $titulek; ?></h1>

<?php  vypis_seznam(__FILE__);  ?>

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
