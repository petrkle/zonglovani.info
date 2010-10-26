{if $video}
<p>{$video.popis}</p>
{/if}

{if $video.typ!='file'}
{if $video.typ=='youtube.com'}
<p class="youtubevideo">
<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/{$video.fid|escape}&amp;hl=cs_CZ&amp;rel=0" class="youtubevideo">
	<param name="movie" value="http://www.youtube.com/v/{$video.fid|escape}&amp;hl=cs_CZ&amp;rel=0" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Pro přehrávání videa je potřeba <a href="http://get.adobe.com/flashplayer/" class="external" onclick="pageTracker._trackPageview('/goto/get.adobe.com/flashplayer');">Adobe Flash</a>
</object>
</p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
<p>
Adresa videa: <a href="http://youtube.com?v={$video.fid|escape}" class="external" onclick="pageTracker._trackPageview('/goto/youtube.com?v={$video.fid|escape}');">http://youtube.com?v={$video.fid|escape}</a>
</p>
{/if}

{if $video.typ=='juggling.tv'}
<p class="youtubevideo">
<object type="application/x-shockwave-flash" data="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" class="youtubevideo">
	<param name="movie" value="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Pro přehrávání videa je potřeba <a href="http://get.adobe.com/flashplayer/" class="external" onclick="pageTracker._trackPageview('/goto/get.adobe.com/flashplayer');">Adobe Flash</a>
</object>
</p>
{if $video.download}
<p><a href="{$video.download|escape}" class="external" onclick="pageTracker._trackPageview('/goto/{$video.download|replace:"http://":""|regex_replace:"/^www\./":""|escape}');">Stáhnout video</a> ze stránky <a href="{if $video.originalurl}{$video.originalurl|escape}{else}http://juggling.tv{/if}" class="external" onclick="pageTracker._trackPageview('/goto/{$video.originalurl|replace:"http://":""|regex_replace:"/^www\./":""|escape}');">juggling.tv</a></p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.velikost} Velikost: {$video.velikost|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
{/if}
{/if}
{else}
<p>
{obrazek soubor=$video.nahled popisek=$video.nazev path='/video/img/'}
<a href="{$video.link|escape}" class="external">Stáhnout video</a>
</p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.velikost} Velikost: {$video.velikost|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
{/if}
<p>
Další <a href="{$dalsividea}">žonglérská videa</a>.
</p>
