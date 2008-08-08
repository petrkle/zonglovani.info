<?php

require("hlavicka.inc");
require("xmldb.inc");
require("utils.inc");



if (array_key_exists("show", $HTTP_GET_VARS)) {
  $show="xml/".$HTTP_GET_VARS["show"].".xml";
};
if(!isset($show)){$show="";};


function informace($show){
if(is_file($show)){
  $info = stat($show);

  echo"
<h3>".basename($show)."</h3>

<p>size: ".round(($info[7]/1024),1)." kb</p>
<p>last access: ".date ("j. n. Y H:i:s",$info[8])."</p>
<p>last modification: ".date ("j. n. Y H:i:s",$info[9])."</p>
<p>last change: ".date ("j. n. Y H:i:s",$info[10])."</p>
";
};

};


if(strlen($show)>0 and is_file($show)){

	$title="Statistika ".basename($show);

  hlavickani($title,__FILE__);

require("titulek.inc");
titulek(__FILE__);


  echo "<div id=\"stranka\"><div id=\"ramecek\">
<div id=\"obsah\">

<h1>Statistika</h1>
";

  informace($show);

  $db = readDatabase($show);
  foreach ($db as $prvek){
	if(get_class($prvek)=="krok"){
	  if(isset($prvek->obrazek)){informace(("img/".$prvek->obrazek).".png");};
	};
  };

  echo "<div class=\"zpet\"><a href=\"javascript:history.go(-1)\" title=\"Návrat o jednu stránku zpìt.\">&laquo; zpìt</a></div>";
  echo "</div>";


}else{
header("Location: .");
 exit();
};

?>

<div id="menu">

<?php
require("menu.inc");
menu(__FILE__);
?>
<div class="spacer"></div>
<h5>Rejstøík</h5>
<div class="menuline"><a href="seznam.php" title="Seznam v¹ech trikù.">Seznam v¹ech zpùsobù</a> ¾onglování popsaných ve slabikáøi.</div>

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
