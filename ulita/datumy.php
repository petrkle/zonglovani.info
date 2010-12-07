<?php

$podzim=array();
$jaro=array();

array_push($podzim,array('datum'=>'2010/10/3','url'=>'udalost-20101003-20101003-pek-1284638162.html'));
array_push($podzim,array('datum'=>'2010/10/17','url'=>'udalost-20101017-20101017-pek-1284638265.html'));
array_push($podzim,array('datum'=>'2010/10/31','url'=>'udalost-20101031-20101031-pek-1284638445.html'));
array_push($podzim,array('datum'=>'2010/11/14','url'=>'udalost-20101114-20101114-pek-1284638655.html'));
array_push($podzim,array('datum'=>'2010/11/21','url'=>'udalost-20101121-20101121-pek-1284638694.html'));
array_push($podzim,array('datum'=>'2010/12/5','url'=>'udalost-20101205-20101205-pek-1284638791.html'));
#array_push($podzim,array('datum'=>'2010/12/19','url'=>'udalost-20101219-20101219-pek-1284638839.html'));

array_push($jaro,array('datum'=>'2011/1/16','url'=>'udalost-20110116-20110116-pek-1284720961.html'));
array_push($jaro,array('datum'=>'2011/1/30','url'=>'udalost-20110130-20110130-pek-1284720999.html'));
array_push($jaro,array('datum'=>'2011/2/13','url'=>'udalost-20110213-20110213-pek-1284721119.html'));
array_push($jaro,array('datum'=>'2011/2/27','url'=>'udalost-20110227-20110227-pek-1284721165.html'));
array_push($jaro,array('datum'=>'2011/3/6','url'=>'udalost-20110306-20110306-pek-1284721221.html'));
array_push($jaro,array('datum'=>'2011/3/20','url'=>'udalost-20110320-20110320-pek-1284721302.html'));
array_push($jaro,array('datum'=>'2011/4/3','url'=>'udalost-20110403-20110403-pek-1284721347.html'));
array_push($jaro,array('datum'=>'2011/4/17','url'=>'udalost-20110417-20110417-pek-1284721417.html'));

function to_ulita($datumy){
	$zacatekakce=' 16:00:00';
	$konecakce=' 19:00:00';
	$navrat=array();
	foreach($datumy as $foo){
		$datum=strtotime($foo['datum'].$konecakce);
		$zdatum=strtotime($foo['datum'].$zacatekakce);
		if($datum>time()){
			array_push($navrat,array('datum'=>date('j. n.',$datum),'url'=>$foo['url'],'mz'=>date('c',$datum),'mk'=>date('c',$zdatum)));
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
