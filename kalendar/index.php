<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

if(preg_match('/index\.php$/',$_SERVER['REQUEST_URI'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.CALENDAR_URL);
	exit();
}

$now=time();
$akt=false;

$trail = new Trail();
$trail->addStep('Kalendář',CALENDAR_URL);

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
$hlavicky=array();
$prevStamp = $month->prevMonth(true);
if((time()-$prevStamp)<3600*24*365*5){
	$prev = date('Y',$prevStamp).'-'.date('m',$prevStamp).'.html';
	$smarty->assign('prevMonth', $prev);
	$hlavicky['predchozi']='<link rel="previous" href="'.$prev.'" />';
}

$nextStamp = $month->nextMonth(true);
if(($nextStamp-time())<3600*24*365*5){
	$next = date('Y',$nextStamp).'-'.date('m',$nextStamp).'.html';
	$smarty->assign('nextMonth', $next);
	$hlavicky['dalsi']='<link rel="next" href="'.$next.'" />';
}

$aktualni = date('Y',$now).'-'.date('m',$now).'.html';
$smarty->assign('aktMonth', $aktualni);
$smarty->assign('aktDate', date('j. ',$now).date('n. ',$now).date('Y',$now));

$smarty->assign('akt', $akt);

if(basename($_SERVER['REQUEST_URI'])==$aktualni){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.CALENDAR_URL);
	exit();
}

$smarty->assign_by_ref('month', $weeksInMonth);
$monthNumber = date('n',$month->getTimeStamp());
$monthName = $mesice[$monthNumber-1]." ".date('Y',$month->getTimeStamp());
$smarty->assign('monthName', $monthName);
$titulek='Kalendář žonglování';

if(date('Y',$now)==$rok and date('m',$now)==$mesic){
	$smarty->assign('dnesek', date('j',$now));
	$smarty->assign('titulek',$titulek);
}else{


	$trail->addStep($monthName,CALENDAR_URL.$rok.'-'.$mesic.'.html');
	$smarty->assign('dnesek',false);
	$smarty->assign('titulek',$titulek.' - '.$monthName);
}

$smarty->assign('caption',$monthName);
$smarty->assign('nadpis',$titulek);

$smarty->assign('description','Kalendář žonglování pro '.mb_convert_case($monthName, MB_CASE_LOWER, 'UTF-8'));
$smarty->assign('keywords',make_keywords($titulek.' '.mb_convert_case($monthName, MB_CASE_LOWER, 'UTF-8')));

if(is_logged()){
$smazane=get_deleted_events();
if(count($smazane)>0){
	$smarty->assign('smazane',$smazane);
}
}

if(count($hlavicky)>0){
	$smarty->assign_by_ref('custom_headers',$hlavicky);
}

$smarty->assign_by_ref('trail', $trail->path);
$smarty->assign('hcalendar',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-index.tpl');
$smarty->display('paticka.tpl');

?>
