<?php
function smarty_function_jsanimace($params, &$smarty){
	extract($params);
	if(!$prefix){
		$prefix='img';
	}
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/animace/'.$prefix.'/'.$a.'.gif')){
		$rozmery=getimagesize($_SERVER['DOCUMENT_ROOT'].'/animace/'.$prefix.'/'.$a.'.gif');
		$vysledek="this.parentNode.innerHTML='<img src=\\'/animace/$prefix/$a.gif\\' width=\\'".$rozmery[0]."\\' height=\\'".$rozmery[1]."\\' style=\\'border:solid 1px #000;\\'/>';return false;";
	}else{
		$vysledek="this.parentNode.innerHTML='Animaci se nepodařilo načíst.';return false;";
	}

	return $vysledek;

}
