<?php
require('../init.php');
require('../func.php');

$titulek='Soubory ke stažení';
$smarty->assign('titulek',$titulek);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/d/downloada.png');
$smarty->assign('description','Soubory ke stažení - žonglování.');
$smarty->assign('feedback',true);

$trail = new Trail();
$trail->addStep($titulek,'/download/');
$downloads=get_downloads();
$smarty->assign_by_ref('downloads', $downloads);
$smarty->assign('poradi', array('pdf','mobi','epub','exe','msi','tar.bz2','apk','wgz','xap'));

if(isset($_GET['id'])){
	if(isset($downloads[$_GET['id']])){
	$id=$_GET['id'];

	if($id=='pdf'){
		$dalsi=array(
			array('url'=>'/download/mobi.html','text'=>'Žonglérův slabikář pro Amazon Kindle','title'=>'Žonglérův slabikář ve formátu mobi.'),
			array('url'=>'/literatura.html','text'=>'Literatura o žonglování','title'=>'Další knížky o žonglování'),
			);
	}

	if($id=='mobi'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/epub.html','text'=>'Žonglérův slabikář - epub','title'=>'Žonglérův slabikář ve formátu epub.'),
			);
	}

	if($id=='epub'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/mobi.html','text'=>'Žonglérův slabikář - mobi','title'=>'Žonglérův slabikář ve formátu mobi.'),
			);
	}

	if($id=='exe'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/msi.html','text'=>'Instalační balíček MSI','title'=>'Žonglérův slabikář ve formátu msi.'),
			);
	}

	if($id=='msi'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/exe.html','text'=>'Instalační balíček EXE','title'=>'Žonglérův slabikář ve formátu exe.'),
			array('url'=>'/download/tar.bz2.html','text'=>'Archiv tar.bz2','title'=>'Žonglérův slabikář ve formátu tar.bz2.'),
			);
	}

	if($id=='tar.bz2'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/msi.html','text'=>'Instalační balíček MSI','title'=>'Žonglérův slabikář ve formátu msi.'),
			);
	}

	if($id=='apk'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/wgz.html','text'=>'Žonglérův slabikář pro Symbian','title'=>'Žonglérův slabikář pro mobily Nokia.'),
			array('url'=>'/download/xap.html','text'=>'Žonglérův slabikář pro Windows Phone','title'=>'Žonglérův slabikář pro mobily Nokia.'),
			);
	}

	if($id=='wgz'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/apk.html','text'=>'Žonglérův slabikář pro Android','title'=>'Žonglérův slabikář pro mobily a tablety s Androidem.'),
			array('url'=>'/download/xap.html','text'=>'Žonglérův slabikář pro Windows Phone','title'=>'Žonglérův slabikář pro mobily Nokia.'),
			);
	}

	if($id=='xap'){
		$dalsi=array(
			array('url'=>'/download/licence.html','text'=>'Licence - CC BY-ND','title'=>'Licence k souboru'),
			array('url'=>'/download/wgz.html','text'=>'Žonglérův slabikář pro Symbian','title'=>'Žonglérův slabikář pro mobily Nokia.'),
			array('url'=>'/download/apk.html','text'=>'Žonglérův slabikář pro Android','title'=>'Žonglérův slabikář pro mobily a tablety s Androidem.'),
			);
	}



	$smarty->assign_by_ref('dalsi',$dalsi);

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
		$dalsi=array(
			array('url'=>'/literatura.html','text'=>'Literatura o žonglování','title'=>'Knížky o žonglování'),
			array('url'=>'/obrazky-na-plochu/','text'=>'Obrázky na plochu','title'=>'Tapety s žonglérskou tématikou.'),
			);
	$smarty->assign_by_ref('dalsi',$dalsi);
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
	$elements=array('version','filename','md5','date','img','size','qr');

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
