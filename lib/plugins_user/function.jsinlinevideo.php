<?php

function smarty_function_jsinlinevideo($params, &$smarty)
{
    extract($params);
    if (is_readable($_SERVER['DOCUMENT_ROOT'].'/video/klip/navod/'.$v.'.xml')) {
        $vysledek = '
<!-- start -->
<p class="animace">
<a href="/video/navod/'.$v.'.html" title="Video"><img src="/img/v/video.s.png" width="20" height="20" title="" alt="" /> Přehrát video</a>
</p>
<!-- stop -->
';
    } else {
        $vysledek = '';
    }

    return $vysledek;
}
