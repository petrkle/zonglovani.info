<?php
require('../init.php');
require('../func.php');

$smarty->assign('titulek','Juggling at Ulita');

$podzim=array();
$jaro=array();

array_push($podzim,array('datum'=>'2009/10/18','url'=>'udalost-20091018-20091018-pek-1253739218.html'));
array_push($podzim,array('datum'=>'2009/11/1','url'=>'udalost-20091101-20091101-pek-1253740284.html'));
array_push($podzim,array('datum'=>'2009/11/15','url'=>'udalost-20091115-20091115-pek-1253740320.html'));
array_push($podzim,array('datum'=>'2009/11/29','url'=>'udalost-20091129-20091129-pek-1253740371.html'));
array_push($podzim,array('datum'=>'2009/12/13','url'=>'udalost-20091213-20091213-pek-1253740425.html'));


array_push($jaro,array('datum'=>'2010/1/10','url'=>'udalost-20100110-20100110-pek-1253740481.html'));
array_push($jaro,array('datum'=>'2010/1/24','url'=>'udalost-20100124-20100124-pek-1253740517.html'));
array_push($jaro,array('datum'=>'2010/2/7','url'=>'udalost-20100207-20100207-pek-1253740566.html'));
array_push($jaro,array('datum'=>'2010/2/21','url'=>'udalost-20100221-20100221-pek-1253740621.html'));
array_push($jaro,array('datum'=>'2010/3/7','url'=>'udalost-20100307-20100307-pek-1253740665.html'));
array_push($jaro,array('datum'=>'2010/3/21','url'=>'udalost-20100321-20100321-pek-1253740740.html'));
array_push($jaro,array('datum'=>'2010/4/4','url'=>'udalost-20100404-20100404-pek-1253740811.html'));



$smarty->assign('podzim',to_ulita($podzim));
$smarty->assign('jaro',to_ulita($jaro));

$trail = new Trail();
$trail->addStep('Žonglování v Ulitě','/ulita/');
$trail->addStep('English version');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ulita.en.tpl');
$smarty->display('paticka.tpl');


function to_ulita($datumy){
	$konecakce=" 19:00:00";
	$navrat=array();
	foreach($datumy as $foo){
		$datum=strtotime($foo['datum'].$konecakce);
		if($datum>time()){
			array_push($navrat,array('datum'=>date("j. n.",$datum),'url'=>$foo['url']));
		}
	}
	return $navrat;
}

?>
