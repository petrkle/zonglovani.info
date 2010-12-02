<?php

function nav_get_stat($datum,$ga){
	$profile_id='18651047';
	$ga->requestReportData($profile_id,array('date'),array('visitors','pageviews'),array('date'),null,$datum,$datum);

	foreach($ga->getResults() as $result){
		$navstevy = $result->getVisitors();
		$stranky = $result->getPageviews();
	}
	return array('vis'=>$navstevy,'pag'=>$stranky);
}

function nav_clean_old_data($navstevnost){
	$now=time();
	foreach($navstevnost as $den){
		if(($now-$den['datum_unix'])>(STAT_EXPIRE*24*3600)){
			unlink(STAT_DATA.'/'.$den['datum'].'.txt');
		}
	}
}

function nav_load_data(){
  if(is_dir(STAT_DATA) and opendir(STAT_DATA)){
	$navrat=array();
	$adr=opendir(STAT_DATA);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == '.txt'){
			$datum=trim(preg_replace('/\.txt$/','',$file));
			$datum_unix=strtotime(trim(preg_replace('/\.txt$/','',$file).' 12:00:00'));
			$data=array();
			foreach(file(STAT_DATA.'/'.$file) as $foo){
				$foo=preg_split('/:/',trim($foo));
				$data[$foo[0]]=$foo[1];
			}
			$navrat[$datum]=array_merge(array('datum'=>$datum,'datum_unix'=>$datum_unix),$data);
		};
	};
	closedir($adr); 
  };
return $navrat;
}

?>
