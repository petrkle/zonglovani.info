<?php
require('../init.php');
require('../func.php');

$titulek='Odeslání vzkazu';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);

if(isset($_GET['m'])){
	$messageid=$_GET['m'];
	$foo=LIDE_VZKAZY.'/'.$messageid;

	if(is_file($foo.'/created.time')){
		$time_from_file = file($foo.'/created.time');
		$time_from_file = trim(array_pop($time_from_file));
	}else{
		$time_from_file = 0;
	}

	if(is_dir($foo) and $time_from_file>(time()-TIMEOUT_VZKAZ)){
		$odesilatel=file($foo.'/odesilatel.txt');
		$odesilatel=trim(array_pop($odesilatel));
		$to=file($foo.'/prijemce.txt');
		$to=trim(array_pop($to));
		$vzkaz=file_get_contents($foo.'/vzkaz.txt');

		$subject='Vzkaz z žonglérova slabikáře';
		$smarty->assign('subject',$subject);
		$smarty->assign('vzkaz',$vzkaz);
		$smarty->assign('from',$odesilatel);
		$domain=preg_split('/@/',$odesilatel);
		$smarty->assign('cid_sender_domain',$domain[1]);
		$smarty->assign('hide_signature',true);


		$vysledek = sendmail(array(
			'from'=>$odesilatel,
			'to'=>$to,
			'subject'=>$subject,
			'text'=>$smarty->fetch('mail/lide-vzkaz.txt.tpl'),
			'html'=>$smarty->fetch('mail/lide-vzkaz.html.tpl'),
		));


		if($vysledek){
			$smarty->assign('chyby',array('Vzkaz byl odeslán.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
			unlink($foo.'/odesilatel.txt');
			unlink($foo.'/prijemce.txt');
			unlink($foo.'/vzkaz.txt');
			unlink($foo.'/created.time');
			rmdir($foo);
		}else{
			$smarty->assign('chyby',array('Při odesílání vzkazu nastala chyba.'));
			$smarty->display('hlavicka.tpl');
			$smarty->display('alert.tpl');
			$smarty->display('paticka.tpl');
		}
	}else{
		$smarty->assign('chyby',array('Neplatný odkaz pro zaslání vzkazu.'));
		$smarty->display('hlavicka.tpl');
		$smarty->display('alert.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	$smarty->assign('chyby',array('Odkaz pro zaslání vzkazu není úplný.'));
	$smarty->display('hlavicka.tpl');
	$smarty->display('alert.tpl');
	$smarty->display('paticka.tpl');
}
