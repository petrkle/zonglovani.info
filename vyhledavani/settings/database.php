<?php
	$database='search-zonglovan';
	$mysql_user='search-zonglovan';
	$mysql_password='ah62QorEx'; 
	$mysql_host='localhost';
	$mysql_table_prefix='search_';

	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success) {
		$trail = new Trail();
		$trail->addStep('Vyhledávání','/vyhledavani/');
		$smarty->assign('titulek','Vyhledávání');
		$smarty->assign('robots','noindex,nofollow');
		$smarty->assign('chyba', 'Chyba připojení do databáze');
		$smarty->assign_by_ref('trail', $trail->path);
		header('HTTP/1.1 500 Service Unavailable');
		$smarty->display('hlavicka.tpl');
		$smarty->display('error-db.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}else{
    $success = mysql_select_db ($database);
	}
	if (!$success) {
		$trail = new Trail();
		$trail->addStep('Vyhledávání','/vyhledavani/');
		$smarty->assign('titulek','Vyhledávání');
		$smarty->assign('robots','noindex,nofollow');
		$smarty->assign('chyba', 'Chyba při výběru databáze');
		$smarty->assign_by_ref('trail', $trail->path);
		header('HTTP/1.1 500 Service Unavailable');
		$smarty->display('hlavicka.tpl');
		$smarty->display('error-db.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}
?>
