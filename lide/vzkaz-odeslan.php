<?php
require('../init.php');
require('../func.php');

$smarty->assign("titulek","Odesl�n� vzkazu");

if(isset($_GET["status"])){
	$status=trim($_GET["status"]);
	if($status=="ok"){
		$smarty->assign("zprava","Vzkaz byl �sp�n� odesl�n.");
	}elseif($status=="verify"){
		$smarty->assign("zprava","Na tv�j e-mail byla odesl�na zpr�va pot�ebn� k dokon�en� zasl�n� vzkazu.");
	}else{
		$smarty->assign("zprava","Oops. Zasl�n� vzkazu selhalo.");
	}
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz-odeslan.tpl');
		$smarty->display('paticka.tpl');

}else{
	header("Location: ".LIDE_URL);
	exit();
}
?>
