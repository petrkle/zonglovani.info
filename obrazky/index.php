<?php
require('../init.php');
require('../func.php');


if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=false;
}

if($id){
	$gal_info=get_galerie_info($id);
	if(isset($gal_info['title'])){
		$smarty->assign('titulek',$gal_info['title']);
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
							$info=get_galerie_info($filename);
				      array_push($navrat,array('name'=>$filename,'title'=>$info['title']));
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
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
						if (preg_match('/.*\.[jpg|jpeg]/',$filename)) {
							$foo=array();
							$foo['obrazek']=OBRAZKY_URL.$galerie.'/'.$filename;
							if(is_file(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename)){
								$size = getimagesize(OBRAZKY_DATA.'/'.$galerie.'/nahledy/'.$filename);
								if($size[0]>$size[1]){
									$foo['format']='ls';
								}else{
									$foo['format']='pt';
								}
								$foo['nahled']=OBRAZKY_URL.'/'.$galerie.'/nahledy/'.$filename;
							}
				      array_push($navrat,$foo);
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
}

?>
