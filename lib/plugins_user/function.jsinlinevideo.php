<?php
function smarty_function_jsinlinevideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			if(isset($klip['youtube'])){
				$js = "this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='<iframe id=\\'player\\' type=\\'text/html\\' class=\\'wyoutubevideo\\' src=\\'https://www.youtube.com/embed/".$klip['youtube']."?enablejsapi=1&origin=https://".$_SERVER['SERVER_NAME']."&autoplay=1&autohide=1&loop=1&playlist=".$klip['youtube']."&rel=0&showinfo=O&fs=0&controls=0&modestbranding=1\\' frameborder=\\'0\\'></iframe>';return false;";
			}else{
		$js="return false;";
			}
$vysledek='
<!-- start -->
<p class="animace">
<a href="/video/navod/'.$v.'.html" title="Video" onkeydown="'.$js.'" onclick="'.$js.'"><img src="/img/v/video.s.png" width="20" height="20" title="" alt="" /> Přehrát video</a>
</p>
<!-- stop -->
';
	}else{
		$vysledek='';
	}

	return $vysledek;

}
