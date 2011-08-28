<?php
function smarty_function_jsanimace($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/animace/img/'.$a.'.gif')){
		$rozmery=getimagesize($_SERVER['DOCUMENT_ROOT'].'/animace/img/'.$a.'.gif');
		$vysledek="this.parentNode.innerHTML='<img src=\\'/animace/img/$a.gif\\' width=\\'".$rozmery[0]."\\' height=\\'".$rozmery[1]."\\' style=\\'border:solid 1px #000;\\'/>';return false;";
	}else{
		$vysledek="this.parentNode.innerHTML='Animaci se nepodařilo načíst.';return false;";
	}

	return $vysledek;

}
