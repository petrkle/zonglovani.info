<?php
require('../../init.php');
require('../../func.php');
require('rozhovory.php');

$titulek='Rozhovory';
$trail = new Trail();
$trail->addStep($titulek,LIDE_URL.'rozhovor');
$smarty->assign('feedback',true);

if(!isset($_GET['id'])){

	$smarty->assign('nadpis',$titulek);
	$smarty->assign('keywords','žonglování, skupina, rozhovor');
	$smarty->assign('description','Rozhovory se žongléry');

	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign_by_ref('rozhovory', $rozhovory);
	$smarty->assign('titulek',$titulek);
	$smarty->display('hlavicka.tpl');
	$smarty->display('rozhovory-index.tpl');
	$smarty->display('paticka.tpl');
}else{
	$id=$_GET['id'];
	if(!isset($rozhovory[$id])){
			require('../../404.php');
			exit();
	}

	$titulek='Rozhovor s '.$rozhovory[$id]['titulek'];
	$smarty->assign('nadpis',$titulek);
	$smarty->assign('keywords','žonglování, '.$rozhovory[$id]['titulek'].', skupina, rozhovor');
	$smarty->assign('description','Rozhovor s žonglérskou skupinou');

	$smarty->assign('nahled','http://zonglovani.info/img/'.preg_replace('/^(.).*/','\1',$rozhovory[$id]['img']).'/'.$rozhovory[$id]['img']);

	$trail->addStep($rozhovory[$id]['titulek']);

	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign_by_ref('rozhovory', $rozhovory);
	$smarty->assign('titulek',$titulek);
	$smarty->display('hlavicka.tpl');
	$smarty->display('rozhovor-'.$id.'.tpl');
	$smarty->display('paticka.tpl');

}
