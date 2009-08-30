<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}elseif(isset($_POST['id'])){
	$id=$_POST['id'];
}else{
	$id=false;
}

$now=time();

if(isset($_GET["deleted"]) or isset($_POST["deleted"])){
	$udalost=get_event_data($id.".cal",CALENDAR_DELETED);
	$trash=true;
}else{
	$udalost=get_event_data($id.".cal");
}
if($udalost){
		$smarty->assign("titulek","Kalend�� - ".$udalost["title"]);
		$smarty->assign("nadpis",$udalost["title"]);
		$smarty->assign("udalost",$udalost);
		$smarty->assign('aktDate', date('j. ',$now).date('n. ',$now).date(' Y',$now));

		if($udalost["end"]<time()){
			$smarty->assign("stare",true);
			$stare=true;
		}else{
			$stare=false;
		}

		if(isset($trash) and isset($_POST["restore"])){
		# obnova
			rename(CALENDAR_DELETED."/".date("Ymd",strtotime($udalost["zacatek"]))."-".date("Ymd",strtotime($udalost["konec"]))."-".$_SESSION["uzivatel"]["login"]."-".$udalost["insert"].".cal",CALENDAR_DATA."/".date("Ymd",strtotime($udalost["zacatek"]))."-".date("Ymd",strtotime($udalost["konec"]))."-".$_SESSION["uzivatel"]["login"]."-".$udalost["insert"].".cal");
			header("Location: ".CALENDAR_URL);
			exit();
		}

		if(isset($trash) and isset($_POST["shred"])){
			unlink(CALENDAR_DELETED."/".date("Ymd",strtotime($udalost["zacatek"]))."-".date("Ymd",strtotime($udalost["konec"]))."-".$_SESSION["uzivatel"]["login"]."-".$udalost["insert"].".cal");
			header("Location: ".CALENDAR_URL);
			exit();
		}

		if(isset($_POST["odeslat"]) and !$stare){
			if(isset($_GET["action"])){
				$udalost=array_merge(get_event_data($id.".cal"),get_udalost_post());
				$chyby=event_validation($udalost,$now);
				$smarty->assign("udalost",$udalost);
				$smarty->assign('chyby',$chyby);
				if(count($chyby)==0){
					unset($udalost["month_url"]);
					unset($udalost["update"]);
					unset($udalost["time"]);
					unset($udalost["end"]);
					unset($udalost["insert_hr"]);
					unset($udalost["start"]);
					unset($udalost["start_hr"]);
					unset($udalost["end_hr"]);
					unset($udalost["update_hr"]);
					$newid=date("Ymd",strtotime($udalost["zacatek"]))."-".date("Ymd",strtotime($udalost["konec"]))."-".$_SESSION["uzivatel"]["login"]."-".$udalost["insert"];

					if($udalost["vlozil"]==$_SESSION["uzivatel"]["login"]){
						if($udalost["id"]==$newid){
							# update, stejny soubor
							write_event_data($udalost);
						}else{
							# update, jin� soubor
							$id=$udalost["id"];
							$udalost["id"]=$newid;
							write_event_data($udalost);
							rename(CALENDAR_DATA."/$id.cal",CALENDAR_DELETED."/$id.cal");
						}
					}
					header("Location: ".CALENDAR_URL."udalost-".$udalost["id"].".html");
					exit();
				}
			}
				$smarty->assign("titulek","�prava ud�losti v kalend��i");
				$smarty->assign("nadpis","�prava ud�losti v kalend��i");
				$smarty->assign("form_action","?action=update");
				$smarty->display('hlavicka.tpl');
				$smarty->display('kalendar-edit.tpl');
				$smarty->display('paticka.tpl');

	}elseif(isset($_POST["smazat"]) and !$stare){
		if($udalost["vlozil"]==$_SESSION["uzivatel"]["login"]){
			rename(CALENDAR_DATA."/".$udalost["id"].".cal",CALENDAR_DELETED."/".$udalost["id"].".cal");
		}
		header("Location: ".$udalost["month_url"]);
		exit();
	}else{
		# zobrazit
		$smarty->assign("keywords",make_keywords("�onglov�n�, kalend��, ".$udalost["title"]));
		$smarty->display('hlavicka.tpl');
		$smarty->display('kalendar-event.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	require("../404.php");
	exit();
}

?>
