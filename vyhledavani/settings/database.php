<?php
	$database='zonglovani_s';
	$mysql_user='zonglovani_s';
	$mysql_host='localhost';
	$mysql_table_prefix='search_';

	$success = mysql_pconnect ($mysql_host, $mysql_user, MYSQL_PASS);
	if (!$success) {
		$trail = new Trail();
		$trail->addStep('Vyhledávání','/vyhledavani/');
		$smarty->assign('titulek','Vyhledávání');
		$smarty->assign('robots','noindex,nofollow');
		$smarty->assign('chyba', 'Chyba připojení do databáze');
		$smarty->assign('trail', $trail->path);
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
		$smarty->assign('trail', $trail->path);
		header('HTTP/1.1 500 Service Unavailable');
		$smarty->display('hlavicka.tpl');
		$smarty->display('error-db.tpl');
		$smarty->display('paticka.tpl');
		exit();
	}
