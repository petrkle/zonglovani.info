<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Odeslání vzkazu");

if(isset($_GET["status"])){
	$status=trim($_GET["status"]);
	if($status=="ok"){
		$smarty->assign("zprava","Vzkaz byl úspěšně odeslán.");
	}elseif($status=="verify"){
		$smarty->assign("zprava","Na tvůj e-mail byla odeslána zpráva potřebná k dokončení zaslání vzkazu.");
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
