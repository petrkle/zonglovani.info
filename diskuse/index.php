<?php
require('../init.php');
require('../func.php');
require($lib.'/Pager/Pager.php');
require($lib.'/nbbc.php');
require('bbcode.init.php');
$zprav_na_stranku=10;

$zpravy=get_diskuse_zpravy($bbcode,$zprav_na_stranku);

$trail = new Trail();
$trail->addStep('Diskuse',DISKUSE_URL);

$pagerOptions = array(
    'mode'     => 'Sliding',
    'delta'    => 2,
		'firstLinkTitle' => 'První stránka',
    'perPage'  => $zprav_na_stranku,
    'altPrev'  => 'Předchozí stránka',
    'altNext'  => 'Další stránka',
    'altPage'  => 'Stránka',
    'separator'  => '~',
    'spacesBeforeSeparator'  => 1,
    'spacesAfterSeparator'  => 1,
		'append'   => false,
		'fileName' => 'stranka%d.html', 
    'itemData' => $zpravy,
);
$pager =& Pager::factory($pagerOptions);

//fetch the paged data into the $data variable
$data = $pager->getPageData();

if(!isset($_GET['pageID']) and !isset($_GET['rss'])){
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: '.DISKUSE_URL.'stranka'.$pager->numPages().'.html');
	exit();
}

$smarty->assign('titulek','Diskuse a komentáře');
$smarty->assign('items', $data);
$smarty->assign('pager_links', $pager->links);
$smarty->assign(
    'page_numbers', array(
        'current' => $pager->getCurrentPageID(),
        'total'   => $pager->numPages()
    )
);


if(isset($_GET['rss'])){
	$smarty->assign_by_ref('zpravy',$zpravy);
	header('Content-Type: application/rss+xml');
	$smarty->display('diskuse-rss.tpl');
	exit();
}else{
	$smarty->assign_by_ref('trail', $trail->path);
	$smarty->display('hlavicka.tpl');
	$smarty->display('diskuse.tpl');
	$smarty->display('paticka.tpl');
}

function get_diskuse_zpravy($bbcode,$zprav_na_stranku){
	$dir = opendir(DISKUSE_DATA);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!ereg('^\.',$filename) and is_file(DISKUSE_DATA.'/'.$filename)) {
							$foo=preg_split('/\./',$filename);
							$foo=preg_split('/-/',$foo[0]);
							$cas=$foo[0];
							$autor=$foo[1];
				      array_push($navrat,array('cas'=>$cas,'cas_mr'=>date('c',$cas),'cas_hr'=>date('G.i',$cas),'datum_hr'=>date('j. n. Y',$cas),'autor'=>$autor,'text'=>$bbcode->Parse(trim(file_get_contents(DISKUSE_DATA.'/'.$filename)))));
					 }
			   }
		   }
	closedir($dir);
	usort($navrat, 'sort_by_time');
	$pocet=count($navrat);
	$stranka=1;
	$foo=1;
	foreach($navrat as $key=>$value){
		$navrat[$key]['stranka']=$stranka;
		if($foo==$zprav_na_stranku*$stranka){
			$stranka++;
		}
		$foo++;
	}
 return $navrat;
}


?>
