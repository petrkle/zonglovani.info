<?php

$podzim=array();
$jaro=array();

array_push($podzim,array('datum'=>'2011/10/9','url'=>'udalost-20111009-20111009-pek-1316975650.html','fb'=>'242907799089836'));
array_push($podzim,array('datum'=>'2011/10/30','url'=>'udalost-20111030-20111030-pek-1316975673.html','fb'=>'209491109117937'));
array_push($podzim,array('datum'=>'2011/11/13','url'=>'udalost-20111113-20111113-pek-1316975713.html','fb'=>'182303711844690'));
array_push($podzim,array('datum'=>'2011/12/4','url'=>'udalost-20111204-20111204-pek-1316975784.html','fb'=>'265102116863604'));

array_push($jaro,array('datum'=>'2012/1/15','url'=>'udalost-20120115-20120115-pek-1316975825.html','fb'=>'274194125936199'));
array_push($jaro,array('datum'=>'2012/2/5','url'=>'udalost-20120205-20120205-pek-1316975853.html','fb'=>'255397247830769'));
array_push($jaro,array('datum'=>'2012/2/26','url'=>'udalost-20120226-20120226-pek-1316975873.html','fb'=>'155026884590468'));
array_push($jaro,array('datum'=>'2012/3/18','url'=>'udalost-20120318-20120318-pek-1316975904.html','fb'=>'226836040705085'));

function to_ulita($datumy){
	$zacatekakce=' 15:00:00';
	$konecakce=' 19:00:00';
	$navrat=array();
	foreach($datumy as $foo){
		$datum=strtotime($foo['datum'].$konecakce);
		$zdatum=strtotime($foo['datum'].$zacatekakce);
		if($datum>time()){
			array_push($navrat,array('datum'=>date('j. n.',$datum),'url'=>$foo['url'],'mz'=>date('c',$datum),'mk'=>date('c',$zdatum),'fb'=>$foo['fb']));
		}
	}
	return $navrat;
}

function get_next_ulita($datumy){
	$now=time();
	$pristi=false;
	foreach($datumy as $foo){
		$datum=strtotime($foo['datum'].' 19:00:00');
		if($datum>$now and $pristi==false){
			$pristi=array('datum'=>date('j. n. Y',$datum),'url'=>$foo['url'],'mz'=>date('c',$datum),'mk'=>date('c',$datum));
		}
	}
	return $pristi;
}

?>
