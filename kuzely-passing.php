<?php
require("init.php");
require("func.php");

if (isset($_GET["show"])) {
  $show="xml/".$_GET["show"];
}else{
	$show="";
}

$titulek="Passing";

if(strlen($show)>0 and is_file($show.".xml")){
	$trik=nacti_trik($show);
	$smarty->assign("trik",$trik);
	$smarty->assign("titulek",$titulek." - ".$trik["info"][1]);
	$smarty->assign("nadpis",$trik["info"][1]);
	$smarty->display("hlavicka.tpl");
	$smarty->display("trik.tpl");
	$smarty->display("paticka.tpl");

}elseif(strlen($show)>0 and !is_file($show.".xml")){
	require("404.inc");
	exit();
}else{
	$smarty->assign("titulek",$titulek);
	$smarty->display("hlavicka.tpl");
	$smarty->display("kuzely-passing.tpl");
	$smarty->display("paticka.tpl");
}
?>

