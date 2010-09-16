<?php
require('../init.php');
require('../func.php');

if(preg_match('/^\/ulita\/\?.*201.+$/',$_SERVER['REQUEST_URI'])){
	header('Location: /ulita/');
	exit();
}

$titulek='Žonglování v Ulitě';
$smarty->assign('titulek',$titulek);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/u/ulita.cz.png');
$smarty->assign('description','Pravidelné nedělní žonglování v DDM Ulita. Přijít mohou začínající i zkušení žongléři a žonglérky. Pro širokou veřejnost jsou k dispozici míčky a kužely k zapůjčení. Žonglovat se může naučit opravdu každý.');
$smarty->assign('icbm','50.094605, 14.481742');

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$dalsi=array(
	array('url'=>'/ulita/cesta.html','text'=>'Jak se dostat do Ulity','title'=>'Popis cesty'),
	array('url'=>CALENDAR_URL,'text'=>'Kalendář žonglérských akcí','title'=>'Kam jít žonglovat'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$podzim=array();
$jaro=array();

array_push($podzim,array('datum'=>'2010/10/3','url'=>'udalost-20101003-20101003-pek-1284638162.html'));
array_push($podzim,array('datum'=>'2010/10/17','url'=>'udalost-20101017-20101017-pek-1284638265.html'));
array_push($podzim,array('datum'=>'2010/10/31','url'=>'udalost-20101031-20101031-pek-1284638445.html'));
array_push($podzim,array('datum'=>'2010/11/14','url'=>'udalost-20101114-20101114-pek-1284638655.html'));
array_push($podzim,array('datum'=>'2010/11/21','url'=>'udalost-20101121-20101121-pek-1284638694.html'));
array_push($podzim,array('datum'=>'2010/12/5','url'=>'udalost-20101205-20101205-pek-1284638791.html'));
array_push($podzim,array('datum'=>'2010/12/19','url'=>'udalost-20101219-20101219-pek-1284638839.html'));

array_push($jaro,array('datum'=>'2010/1/10','url'=>''));
array_push($jaro,array('datum'=>'2010/1/24','url'=>''));
array_push($jaro,array('datum'=>'2010/2/7','url'=>''));
array_push($jaro,array('datum'=>'2010/2/21','url'=>''));
array_push($jaro,array('datum'=>'2010/3/7','url'=>''));
array_push($jaro,array('datum'=>'2010/3/21','url'=>''));
array_push($jaro,array('datum'=>'2010/4/4','url'=>''));
array_push($jaro,array('datum'=>'2010/4/11','url'=>''));



$smarty->assign('podzim',to_ulita($podzim));
$smarty->assign('jaro',to_ulita($jaro));

$smarty->display('hlavicka.tpl');
$smarty->display('ulita.tpl');
$smarty->display('paticka.tpl');


function to_ulita($datumy){
	$konecakce=" 19:00:00";
	$navrat=array();
	foreach($datumy as $foo){
		$datum=strtotime($foo['datum'].$konecakce);
		if($datum>time()){
			array_push($navrat,array('datum'=>date('j. n.',$datum),'url'=>$foo['url']));
		}
	}
	return $navrat;
}

?>
