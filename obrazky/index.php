<?php
require('../init.php');
require('../func.php');


if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

if(isset($_GET['photo'])){
	$photo=$_GET['photo'];
}else{
	$photo=false;
}

if(isset($_GET['filtr'])){
	$filtr=$_GET['filtr'];
}else{
	$filtr=false;
}

if(isset($_GET['pageID'])){
	$stranka=$_GET['pageID'];
}else{
	$stranka=false;
}

if(isset($_GET['rss'])){
	$rss=$_GET['rss'];
}else{
	$rss=false;
}

if($rss){
	header('Content-Type: application/rss+xml');
	$smarty->assign('obrazky',get_galerie());
	$smarty->display('obrazky.rss.tpl');
	exit();
}

if($id){
	$gal_info=get_galerie_info($id);
	if(isset($gal_info['title'])){
		$smarty->assign('gal_id',$id);
		require($lib.'/Pager/Pager.php');
		$obrazky=get_galerie_obrazky($id);

		$poradi=0;
		foreach($obrazky as $key=>$foo){
				$obrazky[$key]['cislo']=$poradi;
			if($poradi!=0){
				$obrazky[$key]['predchozi_cislo']=sprintf('%04d',$poradi-1);
			}
			if($poradi<count($obrazky)-1){
				$obrazky[$key]['dalsi_cislo']=sprintf('%04d',$poradi+1);
			}
			$poradi++;
		}

		$pagerOptions = array(
				'mode'     => 'Sliding',
				'delta'    => 2,
				'firstLinkTitle' => 'První stránka',
				'perPage'  => 15,
				'altPrev'  => 'Předchozí stránka',
				'altNext'  => 'Další stránka',
				'altPage'  => 'Stránka',
				'separator'  => '~',
				'spacesBeforeSeparator'  => 1,
				'spacesAfterSeparator'  => 1,
				'append'   => false,
				'firstLinkNull'   => true,
				'path'   => OBRAZKY_URL.$id,
				'fileName' => 'stranka%d/', 
				'itemData' => $obrazky,
		);
		$pager =& Pager::factory($pagerOptions);
		$data = $pager->getPageData();
		$moznestranky=array();

		foreach($obrazky as $key=>$foo){
			$cislostranky=$pager->getPageIdByOffset($foo['cislo']);
			$obrazky[$key]['stranka']=$cislostranky;
			$moznestranky[$cislostranky]=true;
			$predchozi=$pager->getPageIdByOffset(($foo['cislo']-1));
			$obrazky[$key]['dalsi_stranka']=$pager->getPageIdByOffset($foo['cislo']+1);
			if($predchozi!=1){
				$obrazky[$key]['predchozi_stranka']=$predchozi;
			}
		}
		
		if($stranka and !isset($moznestranky[$stranka])){
			require('../404.php');
			exit();
		}

		$smarty->assign('items', $data);
		$smarty->assign('pager_links', $pager->links);
		$smarty->assign(
				'page_numbers', array(
						'current' => $pager->getCurrentPageID(),
						'total'   => $pager->numPages()
				)
		);

	}else{
	require('../404.php');
	exit();
	}
}
if($id and $photo){
		if(isset($obrazky[intval($photo)])){
			if(isset($gal_info['icbm'])){
				$smarty->assign('icbm',$gal_info['icbm']);
			}
			$smarty->assign('stranka',$pager->getPageIdByOffset($photo));
			$smarty->assign('nahled','http://i.'.$_SERVER['SERVER_NAME'].$obrazky[intval($photo)]['nahled']);
			$smarty->assign('description',$gal_info['title']);
			$titulek=$gal_info['title'].' - '.intval($photo).'. obrázek';
			$obrazek=&$obrazky[intval($photo)];
			if($obrazek['stranka']==1){
				$page='/';
			}else{
				$page='/stranka'.$obrazek['stranka'].'/';
			}

			if($obrazky[intval($photo)]['stranka']!=1){
				$titulek.=' - stránka '.$obrazek['stranka'];
			}
			$smarty->assign('titulek',$titulek);
			$smarty->assign("nadpis",$gal_info['title']);
			$smarty->assign('gal_info',$gal_info);
			$smarty->assign('obrazek',$obrazek);
			$smarty->display('hlavicka-w.tpl');
			if($_SERVER['REQUEST_URI']!=OBRAZKY_URL.$id.$page.$obrazek['url_file']){
				header('Location: '.OBRAZKY_URL.$id.$page.$obrazek['url_file']);
				exit();
			}
			$smarty->display('obrazek.tpl');
			$smarty->display('paticka-w.tpl');
		}else{
			require("../404.php");
			exit();
		}

}elseif($id and !$photo){

		if(isset($gal_info['icbm'])){
			$smarty->assign('icbm',$gal_info['icbm']);
		}

		$titulek=$gal_info['title'].' - obrázky žonglování';

		$smarty->assign('nadpis',$gal_info['title']);

		if($stranka){
			$smarty->assign('stranka',$stranka);
			if($stranka!=1){
				$titulek.=' - stránka '.$stranka;
			}
		}
		$smarty->assign('titulek',$titulek);
		$smarty->assign('gal_info',$gal_info);
		$smarty->display('hlavicka.tpl');
		$smarty->display('obrazky.tpl');
		$smarty->display('paticka.tpl');

}elseif($filtr){
	$smarty->assign('titulek',$filtr.' - filtr obrázků');
	$smarty->assign('nadpis',$filtr.' - filtr obrázků');
	$smarty->assign("notitle",true);
	$galerie=get_galerie($filtr);
	if(count($galerie)>0){
		foreach($galerie as $klic=>$gal){
			$obrazky=array();
			$bar=get_galerie_obrazky($gal['name']);
			$pocet=count($bar);
			$obrazky[2]=$bar[round($pocet/(($pocet/6)*3))];
			$obrazky[1]=$bar[round($pocet/(($pocet/6)*2))];
			$obrazky[0]=$bar[round($pocet/(($pocet/6)*1))];
			$galerie[$klic]['obrazky']=$obrazky;
		}
	}
	$smarty->assign('galerie',$galerie);
	$smarty->display('hlavicka.tpl');
	$smarty->display('obrazky-filtr.tpl');
	$smarty->display('paticka.tpl');
}else{
	$smarty->assign('titulek','Obrázky žonglování');
	$smarty->assign('galerie',get_galerie());
	$smarty->display('hlavicka.tpl');
	$smarty->display('obrazky-index.tpl');
	$smarty->display('paticka.tpl');
}

function get_galerie($filtr='.+'){
	$dir = opendir(OBRAZKY_DATA);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!preg_match('/^\./',$filename) and is_dir(OBRAZKY_DATA.'/'.$filename) and preg_match('/'.$filtr.'/i',$filename)) {
							$datum=preg_split('/-/',$filename);
							$datum=array_pop($datum);
							$info=get_galerie_info($filename);
							if($info){
								$datum_mr=substr($datum,0,4).'-'.substr($datum,4,2).'-'.substr($datum,6,2).'T'.date('H:i:s', filemtime(OBRAZKY_DATA.'/'.$filename.'/index.txt')).'+02:00';
				      	array_push($navrat,array('name'=>$filename,'title'=>$info['title'],'datum'=>$datum,'autor'=>$info['autor'],'datum_mr'=>$datum_mr));
							}
					 }
			   }
		   }
	closedir($dir);
	usort($navrat, 'sort_by_datum');
 return $navrat;
}

function sort_by_datum($a, $b)
{
		return ($a['datum'] > $b['datum']) ? -1 : 1;
}

function get_galerie_info($galerie){
	$navrat=array();
	if(is_file(OBRAZKY_DATA.'/'.$galerie.'/index.txt')){
		$foo=file(OBRAZKY_DATA.'/'.$galerie.'/index.txt');
			foreach($foo as $radek){
				$radek=trim($radek);
				$zac=strpos($radek,":");
				$navrat[substr($radek,0,$zac)]=substr($radek,$zac+1);
			}
	}
	if(isset($navrat["url"])){
		$navrat['url_hr']=preg_replace('/^http:\/\/zonglovani.info/','',$navrat['url']);
	}
	return $navrat;
}

function get_galerie_obrazky($galerie){
	$dir = opendir(OBRAZKY_DATA.'/'.$galerie);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/.+\.(jpg|jpeg|png|gif)$/',$filename)) {
							$foo=array();
							if(is_file(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename)){
								$pripona=preg_split('/\./',$filename);
								$pripona=array_pop($pripona);
								$foo['obrazek']='http://i.'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/'.$filename;
								$size = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename);
								$fsize = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/'.$filename);
								$foo['sirka']=$size[0];
								$foo['vyska']=$size[1];
								$foo['fsirka']=$fsize[0];
								$foo['fvyska']=$fsize[1];
								$foo['url']=OBRAZKY_URL.$galerie.'/'.basename($filename,$pripona).'html';
								$foo['url_file']=basename($filename,$pripona).'html';
								$foo['margin_h']=floor((148-$size[0])/2);
								$foo['margin_v']=floor((148-$size[1])/2);
								$foo['nahled']='http://i.'.$_SERVER['SERVER_NAME'].OBRAZKY_URL.$galerie.'/nahledy/'.$filename;
				      	array_push($navrat,$foo);
							}
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
}

?>
