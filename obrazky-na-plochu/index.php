<?php
require('../init.php');
require('../func.php');

$titulek='Obrázky na plochu';
$trail = new Trail();
$trail->addStep($titulek,WALLPAPERS_URL);

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('keywords','obrázky, žonglování, wallpaper, pozadí na plochu');
$smarty->assign('description','Tapety na plochu počítače s žonglérskou tématikou.');

$smarty->assign('feedback',true);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/obrazky-na-plochu/nahledy/pes-a-micek.jpg');

$dalsi=array(
	array('url'=>'/obrazky/','text'=>'Obrázky žonglování','title'=>'Obrázky žonglérů a žonglérek'),
	);
$smarty->assign_by_ref('dalsi',$dalsi);

$wallpapers=get_wallpapers();

$smarty->assign('titulek',$titulek);
$smarty->assign_by_ref('wallpapers',$wallpapers);
$smarty->display('hlavicka.tpl');
$smarty->display('obrazky-na-plochu.tpl');
$smarty->display('paticka.tpl');


function get_wallpapers(){
	$dir = opendir(WALLPAPERS_DATA.'/nahledy');
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (preg_match('/.+\.(jpg|png)$/',$filename)) {
							$foo=array();
								$pripona=preg_split('/\./',$filename);
								$pripona=array_pop($pripona);
								$foo['nahled_url']='http://'.$_SERVER['SERVER_NAME'].WALLPAPERS_URL.'nahledy/'.$filename;
								$size = getimagesize(WALLPAPERS_DATA.'/nahledy/'.$filename);
								$foo['nahled_sirka']=$size[0];
								$foo['nahled_vyska']=$size[1];
								$foo['soubor']=$filename;
								$foo['basename']=basename($filename,'.'.$pripona);
				      	array_push($navrat,$foo);
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
}
