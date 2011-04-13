<?php
require('../init.php');
require('../func.php');
require($lib.'/nbbc.php');
require($lib.'/bbcode.init.php');

if(is_logged()){

$smarty->assign('titulek','Diskuse o žonglování');
$chyby=array();
$cas=time();

	if(isset($_POST['vzkaz'])){
		$vzkaz=trim($_POST['vzkaz']);
		$smarty->assign('vzkaz',$vzkaz);
		$smarty->assign('vzkaz_html',$bbcode->Parse($vzkaz));
		$_SESSION['vzkaz']=$vzkaz;
	}elseif(isset($_SESSION['vzkaz'])){
		$vzkaz=$_SESSION['vzkaz'];
		$smarty->assign('vzkaz',$vzkaz);
		$smarty->assign('vzkaz_html',$bbcode->Parse($vzkaz));
	}else{
		$vzkaz='';
	}

	if(isset($_POST['nahled'])){
			$_SESSION['nahled']=true;
	}

	if(isset($_SESSION['nahled'])){
			$smarty->assign('nahled',true);
			$smarty->assign('cas_hr',date('G.i',$cas));
			$smarty->assign('datum_hr',date('j. n. Y',$cas));
			$smarty->assign_by_ref('uzivatel',$_SESSION['uzivatel']);
	}

	if(isset($_POST['odeslat']) and isset($_SESSION['nahled'])){

	if(strlen($vzkaz)<5){
		array_push($chyby,'Zpráva je příliš krátká. Minimální délka je pět znaků.');
	}

	if(strlen($vzkaz)>1024){
		array_push($chyby,'Zpráva je příliš dlouhá. Maximální délka je 1024 znaků.');
	}

	if(isset($_POST['antispam'])){
		$odpoved=strtolower(trim($_POST['antispam']));
	}else{
		$odpoved='';
	}

	if($odpoved!=$_SESSION['antispam_odpoved']){
		array_push($chyby,'Špatná odpověď na kontrolní otázku.');
		$antispam=get_antispam();
		$_SESSION['antispam_otazka']=$antispam[0];
		$_SESSION['antispam_odpoved']=$antispam[1];
		$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
		$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
	}

	if(count($chyby)==0 and isset($_SESSION['nahled'])){
		$tmp=DISKUSE_DATA.'/'.$cas.'-'.$_SESSION['uzivatel']['login'].'.txt';
		$foo=fopen($tmp,'w');
		fwrite($foo,$vzkaz);
		fclose($foo);
		unset($_SESSION['vzkaz']);
		unset($_SESSION['nahled']);
		header('Location: '.DISKUSE_URL);
		exit();
	}else{
		$smarty->assign('chyby',$chyby);
	}

}


	$antispam=get_antispam();
	$_SESSION['antispam_otazka']=$antispam[0];
	$_SESSION['antispam_odpoved']=$antispam[1];
	$smarty->assign('antispam_otazka',$_SESSION['antispam_otazka']);
	$smarty->assign('antispam_odpoved',$_SESSION['antispam_odpoved']);
	$smarty->display('hlavicka.tpl');
	$smarty->display('diskuse-add.tpl');
	$smarty->display('paticka.tpl');

}else{
	header('Location: '.LIDE_URL.'prihlaseni.php?next='.DISKUSE_URL.basename(__FILE__).'&notice');
	exit();
}
?>
