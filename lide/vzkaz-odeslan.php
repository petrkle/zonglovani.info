<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Odeslání vzkazu");

if(isset($_GET["status"])){
	$status=trim($_GET["status"]);
	if($status=="ok"){
		$smarty->assign("zprava","Vzkaz byl úspì¹nì odeslán.");
	}elseif($status=="verify"){
		$smarty->assign("zprava","Na tvùj e-mail byla odeslána zpráva potøebná k dokonèení zaslání vzkazu.");
	}else{
		$smarty->assign("zprava","Oops. Zaslání vzkazu selhalo.");
	}
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz-odeslan.tpl');
		$smarty->display('paticka.tpl');

}else{
	header("Location: ".LIDE_URL);
	exit();
}
?>
