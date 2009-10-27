<?php
require('../init.php');
require('../func.php');
require('cal-init.php');

if(is_logged()){
	$smarty->assign("titulek","Nastavení");
	$now=time();

$smarty->assign("titulek","Přidat událost do kalendáře");


$udalost=get_udalost_post();

if(isset($_POST["odeslat"])){
	$chyby=event_validation($udalost,$now);
	
	if(count($chyby)==0){
		$udalost["time_start"]=date("H:i",strtotime($udalost["zacatek"]));
		$udalost["time_end"]=date("H:i",strtotime($udalost["konec"]));
		$udalost["update"]=date("Ymd H:i",$now);
		$udalost["insert"]=$now;
		$udalost["vlozil"]=$_SESSION["uzivatel"]["login"];
		$udalost["id"]=date("Ymd",strtotime($udalost["zacatek"]))."-".date("Ymd",strtotime($udalost["konec"]))."-".$_SESSION["uzivatel"]["login"]."-".$now;
		write_event_data($udalost);
		header("Location: ".CALENDAR_URL."udalost-".$udalost["id"].".html");
		exit();
	}
}

if(isset($chyby)){
	$smarty->assign('chyby',$chyby);
}
$smarty->assign('udalost',$udalost);
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-edit.tpl');
$smarty->display('paticka.tpl');

}else{
	header("Location: ".LIDE_URL."prihlaseni.php?next=".CALENDAR_URL.basename(__FILE__)."&notice");
	exit();
}

?>
