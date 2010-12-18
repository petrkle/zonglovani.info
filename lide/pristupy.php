<?php
require('../init.php');
require('../func.php');
require('../admin/admin.func.php');

if(is_logged()){

	$titulek='Seznam přihlášení do žonglérova slabikáře';
	$nadpis='Seznam přihlášení';
	$popis='Seznam tvých přihlášení do žonglérova slabikáře.';

	$smarty->assign('styly',array('/s.css'));
	$trail = new Trail();
	$trail->addStep('Seznam žonglérů',LIDE_URL);
	$trail->addStep($_SESSION['uzivatel']['jmeno'],LIDE_URL.$_SESSION['uzivatel']['login'].'.html');
	$trail->addStep('Přístupy',LIDE_URL.'pristupy.php');

	$smarty->assign('keywords','přihlášení, žonglérův slabikář');
	$smarty->assign('description',$popis);
	$smarty->assign('titulek',$titulek);
	$smarty->assign('nadpis',$nadpis);

	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign_by_ref('prihlaseni', array_reverse(get_login_detail($_SESSION['uzivatel']['login'])));
	$smarty->display('hlavicka-w.tpl');
	$smarty->display('lide-pristupy.tpl');
	$smarty->display('paticka-w.tpl');

}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?next='.LIDE_URL.'pristupy.php&notice');
	exit();
}
?>
