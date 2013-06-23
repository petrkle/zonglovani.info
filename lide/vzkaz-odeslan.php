<?php
require('../init.php');
require('../func.php');

$titulek='Odeslání vzkazu';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['status'])){
	$status=trim($_GET['status']);
	if($status=='ok'){
		$smarty->assign('zprava','Vzkaz byl úspěšně odeslán.');
	}elseif($status=='verify'){
		$smarty->assign('zprava','Na tvůj e-mail byla odeslána zpráva potřebná k dokončení zaslání vzkazu.');
	}else{
		$smarty->assign('zprava','Oops. Zaslání vzkazu selhalo.');
	}
		$smarty->display('hlavicka.tpl');
		$smarty->display('vzkaz-odeslan.tpl');
		$smarty->display('paticka.tpl');

}else{
	header('Location: '.LIDE_URL);
	exit();
}
