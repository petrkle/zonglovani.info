<?php
require('../init.php');
require('cal-init.php');

$now=time();
$akt=false;


if(isset($_GET['y'])){
	$rok=$_GET['y'];
}else{
	$rok=date('Y',$now);
	$akt=true;
}

if(isset($_GET['m'])){
	$mesic=$_GET['m'];
}else{
	$mesic=date('m',$now);
}

$events=get_cal_data($rok,$mesic);

$month = new Calendar_Month_Weekdays($rok,$mesic,1);

// Set the current day as a Selected Day and put it in the array
$selectedDays = array (new Calendar_Day(date('Y'), date('m'), date('d'))); 

// Build the days and the workshop events to the decorator
$monthDecorator = new MonthPayload_Decorator($month);
$monthDecorator->build($selectedDays, $events);

// Fetch all days in the month object
$daysInMonth =& $monthDecorator->fetchAll();

// Split the month into weeks
$weeksInMonth = array_chunk($daysInMonth, 7);


// Create links
$prevStamp = $month->prevMonth(true);
if((time()-$prevStamp)<3600*24*150){
	$prev = date('Y',$prevStamp).'-'.date('m',$prevStamp).'.html';
	$smarty->assign('prevMonth', $prev);
}

$nextStamp = $month->nextMonth(true);
if(($nextStamp-time())<3600*24*365*2){
	$next = date('Y',$nextStamp).'-'.date('m',$nextStamp).'.html';
	$smarty->assign('nextMonth', $next);
}

$aktStamp=$now;
$aktualni= date('Y',$aktStamp).'-'.date('m',$aktStamp).'.html';
$smarty->assign('aktMonth', $aktualni);
$smarty->assign('akt', $akt);


$smarty->assign_by_ref('month', $weeksInMonth);
$monthNumber = date('n',$month->getTimeStamp());
$monthName = $mesice[$monthNumber-1]." ".date('Y',$month->getTimeStamp());
$smarty->assign('monthName', $monthName);


$smarty->assign("titulek","Kalendáø - $monthName");
$smarty->assign("nadpis","$monthName");
$smarty->display('hlavicka.tpl');



$smarty->display('kalendar-index.tpl');
$smarty->display('paticka.tpl');


?>
