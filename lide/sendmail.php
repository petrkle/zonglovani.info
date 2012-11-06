<?php
require('../init.php');
require('../func.php');
include_once($lib.'/SMTP.php');
include_once($lib.'/Mail.php');
include_once($lib.'/Mail/mime.php');

$titulek='Odeslání vzkazu';
$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Seznam žonglérů',LIDE_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

if(isset($_GET['m'])){
	$messageid=$_GET['m'];
	$foo=LIDE_VZKAZY.'/'.$messageid;

	if(is_dir($foo) and trim(array_pop(file($foo.'/created.time')))>(time()-TIMEOUT_VZKAZ)){
		$odesilatel=trim(array_pop(file($foo.'/odesilatel.txt')));
		$to=trim(array_pop(file($foo.'/prijemce.txt')));
		$vzkaz=file_get_contents($foo.'/vzkaz.txt');

		$subject='Vzkaz z žonglérova slabikáře';
		$smarty->assign('subject',$subject);
		$smarty->assign('vzkaz',$vzkaz);
		$smarty->assign('from',$odesilatel);
		$domain=preg_split('/@/',$odesilatel);
		$smarty->assign('cid_sender_domain',$domain[1]);


		$vysledek = sendmail(array(
			'from'=>$odesilatel,
			'to'=>$to,
			'subject'=>$subject,
			'text'=>$smarty->fetch('mail/lide-vzkaz.txt.tpl'),
			'html'=>$smarty->fetch('mail/lide-vzkaz.html.tpl'),
			'img'=>array('../img/z/zs-vizitka.png'),
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
