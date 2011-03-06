<?php
require('../init.php');
require('../func.php');

$titulek='Soubory ke stažení';
$smarty->assign('titulek',$titulek);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/d/download.png');
$smarty->assign('description','Soubory ke stažení - žonglování.');

$trail = new Trail();
$trail->addStep($titulek,'/download/');
$downloads=get_downloads();
$smarty->assign_by_ref('downloads', $downloads);
$smarty->assign('poradi', array('exe','msi','tar.bz2'));

if(isset($_GET['id'])){
	if(isset($downloads[$_GET['id']])){
	$id=$_GET['id'];

	$smarty->assign('titulek',$titulek.' - '.$id);
	$smarty->assign('nadpis','Žonglérův slabikář - '.$id);
	$smarty->assign('description','Soubory ke stažení - žonglérův slabikář ve formátu '.$id);

	$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/p/package-'.$id.'.png');
	$trail->addStep($id);
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->assign_by_ref('download_id', $id);

	$smarty->display('hlavicka.tpl');
	$smarty->display('download.detail.tpl');
	$smarty->display('paticka.tpl');
	}else{
		require('../404.php');
		exit();
	}
}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('download.tpl');
	$smarty->display('paticka.tpl');
}




function get_downloads(){
	$navrat=array();
	$dir = opendir('./versions');
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/.+\.xml$/',$filename)) {
							$id=preg_replace('/\.xml$/','',$filename);
							$navrat[$id]=array('filename'=>$filename,'versions'=>get_download_info($filename));
					 }
			   }
		   }
	closedir($dir);
return $navrat;
}

function get_download_info($filename){
	$xml = simplexml_load_file('./versions/'.$filename);
	$download=array();
	$elements=array('version','filename','md5','date','img','size');

	foreach ($xml->release as $release){
		$foo=array();
		$foo['description'] = (string) $xml->description;
		foreach($elements as $baz){
			if($release->$baz){
				$foo[$baz] = (string) $release->$baz;
			}
		}
		if(isset($foo['date'])){
			$foo['date_hr']=date('j. n. Y',strtotime($foo['date']));
		}
		array_push($download,$foo);
	}
	return $download;
}

?>
