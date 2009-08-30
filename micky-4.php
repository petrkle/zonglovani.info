<?php
require("init.php");
require("func.php");

if (isset($_GET["show"])) {
  $show="xml/".$_GET["show"];
}else{
	$show="";
}

$titulek="®onglování se ètyømi míèky";

if(strlen($show)>0 and is_file($show.".xml")){
	$trik=nacti_trik($show);
	$smarty->assign("trik",$trik);
	$smarty->assign("titulek",$titulek." - ".$trik["info"][1]);
	$smarty->assign("nadpis",$trik["info"][1]);
	$smarty->assign("keywords",make_keywords($titulek.",".$trik["info"][1]));
	$smarty->display("hlavicka.tpl");
	$smarty->display("trik.tpl");
	$smarty->display("paticka.tpl");

}elseif(strlen($show)>0 and !is_file($show.".xml")){
	require("404.php");
	exit();
}else{
	$smarty->assign("titulek",$titulek);
	$smarty->display("hlavicka.tpl");
	$smarty->display("micky-4-pred.tpl");
	$smarty->assign("triky",get_seznam_triku(__FILE__));
	$smarty->display("seznam-triku.tpl");
	$smarty->display("paticka.tpl");
}
?>
