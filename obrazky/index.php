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

if($id and $photo){
	$gal_info=get_galerie_info($id);
	if(isset($gal_info['title'])){
		$obrazky=get_galerie_obrazky($id);
		if(isset($obrazky[intval($photo)])){
			if(isset($obrazky[intval($photo)+1])){
				$smarty->assign('dalsi',$obrazky[intval($photo)+1]['url']);
			}
			if(isset($obrazky[intval($photo)-1])){
				$smarty->assign('predchozi',$obrazky[intval($photo)-1]['url']);
			}
			$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].$obrazky[intval($photo)]['nahled']);
			$smarty->assign('description',$gal_info['title'].' - '.intval($photo).'. obrázek');
			$smarty->assign('titulek',$gal_info['title'].' - '.intval($photo).'. obrázek');
			$smarty->assign('titulek_utf',iconv('iso-8859-2','utf8',$gal_info['title']));
			$smarty->assign("nadpis",$gal_info['title']);
			$smarty->assign('gal_info',$gal_info);
			$smarty->assign('obrazek',$obrazky[intval($photo)]);
			$smarty->display('hlavicka-w.tpl');
			$smarty->display('obrazek.tpl');
			$smarty->display('paticka-w.tpl');
		}else{
			require("../404.php");
			exit();
		}
	}else{
		require("../404.php");
		exit();
	}

}elseif($id and !$photo){
	$gal_info=get_galerie_info($id);
	if(isset($gal_info['title'])){
		$smarty->assign('titulek',$gal_info['title'].' - obrázky ¾onglování');
		$smarty->assign("nadpis",$gal_info['title']);
		$smarty->assign('gal_info',$gal_info);
		$smarty->assign('obrazky',get_galerie_obrazky($id));
		$smarty->display('hlavicka.tpl');
		$smarty->display('obrazky.tpl');
		$smarty->display('paticka.tpl');
	}else{
	require("../404.php");
	exit();
	}
}else{
	$smarty->assign('titulek','Obrázky ¾onglování');
	$smarty->assign('galerie',get_galerie());
	$smarty->display('hlavicka.tpl');
	$smarty->display('obrazky-index.tpl');
	$smarty->display('paticka.tpl');

}

function get_galerie(){
	$dir = opendir(OBRAZKY_DATA);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!ereg("^\.",$filename) and is_dir(OBRAZKY_DATA."/$filename")) {
							$datum=preg_split('/-/',$filename);
							$datum=array_pop($datum);
							$info=get_galerie_info($filename);
							if($info){
				      	array_push($navrat,array('name'=>$filename,'title'=>$info['title'],'datum'=>$datum));
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
						if (preg_match('/.+\.(jpg|jpeg|png|gif)/',$filename)) {
							$foo=array();
							if(is_file(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename)){
								$pripona=preg_split('/\./',$filename);
								$pripona=array_pop($pripona);
								$foo['obrazek']=OBRAZKY_URL.$galerie.'/'.$filename;
								$size = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename);
								$fsize = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/'.$filename);
								$foo['sirka']=$size[0];
								$foo['vyska']=$size[1];
								$foo['fsirka']=$fsize[0];
								$foo['fvyska']=$fsize[1];
								$foo['url']=OBRAZKY_URL.$galerie.'/'.basename($filename,$pripona).'html';
								$foo['margin_h']=floor((148-$size[0])/2);
								$foo['margin_v']=floor((148-$size[1])/2);
								$foo['nahled']=OBRAZKY_URL.$galerie.'/nahledy/'.$filename;
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
