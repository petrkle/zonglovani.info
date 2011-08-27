<?php
function smarty_function_video($params, &$smarty){
	extract($params);
	return '
<!-- start -->
<p class="animace">
<a href="/video/navod/'.$jtvw.'.html" title="Video"><img src="/img/a/animace.png" width="40" height="40" title="" alt="" /> Přehrát video</a>
</p>
<!-- stop -->
';

}
