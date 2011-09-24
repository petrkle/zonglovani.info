<?php
function smarty_function_jsinlineamin($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/animace/img/'.$a.'.gif')){
		$rozmery=getimagesize($_SERVER['DOCUMENT_ROOT'].'/animace/img/'.$a.'.gif');
		$foo="this.parentNode.innerHTML='<img src=\\'/animace/img/$a.gif\\' width=\\'".$rozmery[0]."\\' height=\\'".$rozmery[1]."\\' style=\\'border:solid 1px #000;\\'/>';_gaq.push(['_trackPageview','/animace/$a.html']);return false;";
		$vysledek='
<!-- start -->
<p class="animace">
<a href="/animace/'.$a.'.html" title="Animace" onkeydown="'.$foo.'" onclick="'.$foo.'"><img src="/img/a/animace.s.png" width="20" height="20" title="" alt="" /> Přehrát animaci</a>
</p>
<!-- stop -->
';
	}else{
		$vysledek='';
	}

	return $vysledek;

}
