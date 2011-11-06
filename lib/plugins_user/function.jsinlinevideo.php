<?php
function smarty_function_jsinlinevideo($params, &$smarty){
	extract($params);
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')){
			$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml');
			$klip = (array) $xml;
			$klic = preg_split('/:/',$klip['link']);
			$klic = $klic[2];
			if(isset($klip['youtube'])){
				$dataurl="http://www.youtube.com/v/".$klip['youtube']."?version=3&amp;hl=cs_CZ&amp;rel=0&amp;autoplay=1";
			}else{
				$dataurl="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key=".$klic."&amp;autostart=true";
			}
		$js="this.parentNode.setAttribute('class','wyoutubevideo');this.parentNode.innerHTML='<object type=\\'application/x-shockwave-flash\\' data=\\'$dataurl\\' class=\\'wyoutubevideo\\'><param name=\\'movie\\' value=\\'$dataurl\\' /><param name=\\'wmode\\' value=\\'transparent\\' /><param name=\\'allowscriptaccess\\' value=\\'always\\' /><param name=\\'allowfullscreen\\' value=\\'false\\' /><param name=\\'pluginspage\\' value=\\'http://get.adobe.com/flashplayer/\\' />Uložit video <a href=\\'".$klip['download']."\\' class=\\'external\\'>$v.mp4</a> (".$klip['velikost'].", ".$klip['delka'].").</object>';_gaq.push(['_trackPageview','/video/navod/$v.html']);return false;";
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
