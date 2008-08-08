<?php
require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");

$titulek="®onglování se tøemi ku¾ely";

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
<p>
S ku¾ely se dají dìlat obdobné triky jako se <a href="/zonglovani/micky/3/" title="®onglování se tøemi míèky.">tøemi míèky</a>.
</p>

<p>
Daleko lep¹í je s ku¾ely <a href="/zonglovani/kuzely/passing/" title="®onglování ve více lidech.">passovat</a>.
</p>

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
