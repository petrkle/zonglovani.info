<?php
require('../init.php');
require('cal-init.php');
require('../func.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}elseif(isset($_POST['id'])){
	$id=$_POST['id'];
}else{
	$id=false;
}


$trail = new Trail();
$trail->addStep('Kalendář',CALENDAR_URL);

$now=time();

if(isset($_GET['deleted']) or isset($_POST['deleted'])){
	$udalost=get_event_data($id.'.cal',CALENDAR_DELETED);
	$trash=true;
	$smarty->assign('trash',true);
}else{
	$udalost=get_event_data($id.'.cal');
}

if($udalost){
		$smarty->assign('feedback',true);
	if(date('Y',$udalost['start']) != date('Y',$udalost['end'])){
		$append_y=' Y';
	}else{
		$append_y='';
	}

	if(date('nY',$udalost['start']) != date('nY',$udalost['end'])){
		$append_m=' n.';
	}else{
		$append_m='';
	}
		$start_day=date('j.'.$append_m.$append_y,$udalost['start']);
		$end_day=date('j. n. Y',$udalost['end']);
		if(date('j. n. Y',$udalost['start']) == date('j. n. Y',$udalost['end'])){
			$doba=date('j. n. Y',$udalost['start']);
		}else{
			$doba=$start_day.' až '.$end_day;
		}
		$titulek=$udalost['title'].' '.$doba.' - kalendář žonglování';
		$smarty->assign('titulek',$titulek);
		$smarty->assign('description',$titulek);
		$smarty->assign('nadpis',$udalost['title']);
		$smarty->assign('udalost',$udalost);
		$smarty->assign('aktDate', date('j. ',$now).date('n. ',$now).date(' Y',$now));

		if($udalost['end']<time()){
			$smarty->assign('stare',true);
			$stare=true;
		}else{
			$stare=false;
		}

		if(isset($trash) and isset($_POST['restore'])){
		# obnova
			rename(CALENDAR_DELETED.'/'.date('Ymd',strtotime($udalost['zacatek'])).'-'.date('Ymd',strtotime($udalost['konec'])).'-'.$_SESSION['uzivatel']['login'].'-'.$udalost['insert'].'.cal',CALENDAR_DATA.'/'.date('Ymd',strtotime($udalost['zacatek'])).'-'.date('Ymd',strtotime($udalost['konec'])).'-'.$_SESSION['uzivatel']['login'].'-'.$udalost['insert'].'.cal');
			header('Location: '.CALENDAR_URL);
			exit();
		}

		if(isset($trash) and isset($_POST['shred'])){
			unlink(CALENDAR_DELETED.'/'.date('Ymd',strtotime($udalost['zacatek'])).'-'.date('Ymd',strtotime($udalost['konec'])).'-'.$_SESSION['uzivatel']['login'].'-'.$udalost['insert'].'.cal');
			if(isset($udalost['img']) and is_readable(CALENDAR_IMG.'/'.$udalost['img'])){
				unlink(CALENDAR_IMG.'/'.$udalost['img']);
			}
			header('Location: '.CALENDAR_URL);
			exit();
		}

		if(isset($_POST['smazatimg'])){
					if($udalost['vlozil']==$_SESSION['uzivatel']['login']){
						unset($udalost['img']);
						unlink(CALENDAR_IMG.'/'.$udalost['img']);
						write_event_data($udalost);
						header('Location: '.CALENDAR_URL.'udalost-'.$udalost['id'].'.html');
						exit();
					}
		}

		if(isset($_POST['odeslat']) and !$stare){
			$smarty->assign('styly',array('/k.css'));
			if(isset($_GET['action'])){
				$udalost=array_merge(get_event_data($id.'.cal'),get_udalost_post());
				$chyby=event_validation($udalost,$now);
				$smarty->assign('udalost',$udalost);
				$smarty->assign('chyby',$chyby);
				if(count($chyby)==0){
					unset($udalost['month_url']);
					unset($udalost['update']);
					unset($udalost['time']);
					unset($udalost['end']);
					unset($udalost['insert_hr']);
					unset($udalost['start']);
					unset($udalost['start_hr']);
					unset($udalost['end_hr']);
					unset($udalost['update_hr']);
					$newid=date('Ymd',strtotime($udalost['zacatek'])).'-'.date('Ymd',strtotime($udalost['konec'])).'-'.$_SESSION['uzivatel']['login'].'-'.$udalost['insert'];

					if($udalost['vlozil']==$_SESSION['uzivatel']['login']){
						if($udalost['id']==$newid){
							# update, stejny soubor
							write_event_data($udalost);
						}else{
							# update, jiný soubor
							$id=$udalost["id"];
							$udalost["id"]=$newid;
							write_event_data($udalost);
							rename(CALENDAR_DATA."/$id.cal",CALENDAR_DELETED."/$id.cal");
						}
					}
					header('Location: '.CALENDAR_URL.'udalost-'.$udalost['id'].'.html');
					exit();
				}
			}
				$trail->addStep($udalost['month_name'],$udalost['month_url']);
				$trail->addStep($udalost['title'],CALENDAR_URL.'udalost-'.$udalost['id'].'.html');
				$trail->addStep('Úprava');
				$smarty->assign('titulek','Úprava události v kalendáři');
				$smarty->assign('nadpis','Úprava události v kalendáři');
				$smarty->assign('form_action','?action=update');
				$smarty->assign_by_ref('trail', $trail->path);
				$smarty->display('hlavicka.tpl');
				$smarty->display('kalendar-edit.tpl');
				$smarty->display('paticka.tpl');

	}elseif(isset($_POST['smazat']) and !$stare){
		if($udalost['vlozil']==$_SESSION['uzivatel']['login']){
			rename(CALENDAR_DATA.'/'.$udalost['id'].'.cal',CALENDAR_DELETED.'/'.$udalost['id'].'.cal');
		}
		header('Location: '.$udalost['month_url']);
		exit();
	}else{
		# zobrazit
		$events_around=get_events_around($id);
		$smarty->assign('styly',array('/a.css'));
		$navigace=array();
		$hlavicky=array();

		$navigace['mesic']=$udalost['month_url'];
		if(isset($events_around['prev'])){
			$navigace['predchozi']=array('url'=>'udalost-'.$events_around['prev']['id'].'.html','text'=>$events_around['prev']['title'],'title'=>$events_around['prev']['desc']);
			$hlavicky['predchozi']='<link rel="previous" href="udalost-'.$events_around['prev']['id'].'.html" />';
		}
		if(isset($events_around['next'])){
			$navigace['dalsi']=array('url'=>'udalost-'.$events_around['next']['id'].'.html','text'=>$events_around['next']['title'],'title'=>$events_around['next']['desc']);
			$hlavicky['dalsi']='<link rel="next" href="udalost-'.$events_around['next']['id'].'.html" />';
		}

		$smarty->assign_by_ref('navigace',$navigace);

	$hlavicky['nahoru']='<link rel="up" href="'.$udalost['month_url'].'" />';

	if(count($hlavicky)>0){
		$smarty->assign_by_ref('custom_headers',$hlavicky);
	}

		$smarty->assign('fbsdileni','tuto událost');
		$smarty->assign('hcalendar',true);
		$trail->addStep($udalost['month_name'],$udalost['month_url']);
		$trail->addStep($udalost['title']);
		if(isset($udalost['img'])){
			$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/kalendar/obrazek-'.$udalost['img']);
		}else{
			$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/k/kalendar.png');
		}
		$smarty->assign('keywords',make_keywords('žonglování, kalendář, '.$udalost['title']));
		$smarty->assign_by_ref('trail', $trail->path);
		$smarty->display('hlavicka.tpl');
		$smarty->display('kalendar-event.tpl');
		$smarty->display('paticka.tpl');
	}

}else{
	require("../404.php");
	exit();
}
