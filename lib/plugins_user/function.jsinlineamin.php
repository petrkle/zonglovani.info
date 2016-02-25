<?php
function smarty_function_jsinlineamin($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/animace/img/'.$a.'.gif')){
		$vysledek='
<!-- start -->
<p class="animace">
<a href="/animace/'.$a.'.html" title="Animace"><img src="/img/a/animace.s.png" width="20" height="20" title="" alt="" /> Přehrát animaci</a>
</p>
<!-- stop -->
';
	}else{
		$vysledek='';
	}

	return $vysledek;

}
