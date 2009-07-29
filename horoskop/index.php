<?php
require('../init.php');
require('../func.php');
require_once('horoskop-data.inc');
require_once('horoskop.inc');

if(isset($_GET["znameni"])){$znameni=$_GET["znameni"];}else{$znameni="";};

$znameni=filtr(strtolower(trim($znameni)),$zverokruh);


if(isset($_GET["zitra"])){
	$nadpis="Horoskop ¾onglování na zítra";
}else{
	$nadpis="Horoskop ¾onglování";
}

if($_SERVER["REQUEST_URI"]=="/horoskop/"){
	header("Location: /horoskop/beran.html");
	exit();
}

$titulek=$nadpis." - ".$zverokruh[$znameni]["popis"];

if(isset($_GET["zitra"])){
	$smarty->assign("predpoved",predpoved($znameni,(time()+(24*3600))));
	$smarty->assign("zitra","jo");
}else{
	$smarty->assign("predpoved",predpoved($znameni,time()));
}

$smarty->assign("titulek",$titulek);
$smarty->assign("zverokruh",$zverokruh);
$smarty->assign("znameni",$znameni);
$smarty->display('hlavicka.tpl');
$smarty->display('horoskop.tpl');
$smarty->display('paticka.tpl');
?>
