<?php
$videi_na_stranku=5;

function get_videa($path=''){
  $ls=$_SERVER['DOCUMENT_ROOT'].'/video/klip';
	if(strlen($path)>0){
		$ls.='/'.$path;
	}
  if(is_dir($ls) and opendir($ls)){
	$vypis=array();
	$adr=opendir($ls);
	$foo=0;
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == '.xml'){
		  $file = substr($file, 0, -4);
			$fl = substr($file,0,1);
			$xml = simplexml_load_file($ls.'/'.$file.'.xml');
			$klip = (array) $xml;
			$vypis[$foo]=$klip;
			$vypis[$foo]['id']=$file;
			if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/img/'.$fl.'/'.$file.'.jpg')){
				$vypis[$foo]['nahled']=$file.'.jpg';
			}
			if(isset($klip['download']) and preg_match('/juggling\.tv\/download\//',$klip['download'])){
				$vypis[$foo]['originalurl']	= preg_replace('/.*download\/(encoded|original)\/([0-9]+)\/.*/','http://juggling.tv/\2',$klip['download']);
			}
			$foo++;
		};
	};
	closedir($adr); 
  };

  usort($vypis, 'sort_by_v_title'); 
	return $vypis;
}

function sort_by_v_title($a, $b){
	global $trans;
  $a['nazev'] = strtr($a['nazev'], $trans);
  $b['nazev'] = strtr($b['nazev'], $trans);
  return strcmp($a['nazev'], $b['nazev']);
};
?>
