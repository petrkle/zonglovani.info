<?php
require("init.php");
require("func.php");


if (isset($_GET["show"])) {
  $show="xml/".$_GET["show"];
}else{
	$show="";
}


if(strlen($show)>0 and is_file($show.".xml")){
  // vykreslí jeden trik
	
	$trik=nacti_trik($show);
	$smarty->assign("trik",$trik);
	$smarty->assign("titulek","®onglování se ètyømi kruhy - ".$trik["info"][1]);
	$smarty->assign("nadpis",$trik["info"][1]);
	$smarty->assign("keywords",make_keywords("®onglování se ètyømi kruhy,".$trik["info"][1]));
	$smarty->display("hlavicka.tpl");
	$smarty->display("trik.tpl");
	$smarty->display("paticka.tpl");

}else{
  // kdy¾ není vybrán trik
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: /kruhy/");
	exit();
}
?>
