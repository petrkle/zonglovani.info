{if isset($video)}
<p>{$video.popis}</p>
{/if}

{if $video.typ!='file'}
{if $video.typ=='youtube.com'}
<p class="youtubevideo">
<object type="application/x-shockwave-flash" data="//www.youtube.com/v/{$video.fid|escape}&amp;hl=cs_CZ&amp;rel=0" class="youtubevideo">
	<param name="movie" value="//www.youtube.com/v/{$video.fid|escape}&amp;hl=cs_CZ&amp;rel=0" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Přehrát video přímo na stránce <a href="http://youtu.be/{$video.fid|escape}" class="external">youtu.be/{$video.fid|escape}</a>
</object>
</p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
<p>
Adresa videa: <a href="http://youtu.be/{$video.fid|escape}" class="external">http://youtu.be/{$video.fid|escape}</a>
</p>
{/if}

{if $video.typ=='juggling.tv'}
<p class="{if $event=='navod'}wyoutubevideo{else}youtubevideo{/if}">
<object type="application/x-shockwave-flash" data="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" class="{if $event=='navod'}wyoutubevideo{else}youtubevideo{/if}">
	<param name="movie" value="http://juggling.tv/nvplayer.swf?config=http://juggling.tv/nuevo/econfig.php?key={$video.fid}" />
	<param name="wmode" value="transparent" />
	<param name="allowscriptaccess" value="always" />
	<param name="allowfullscreen" value="false" />
	<param name="pluginspage" value="http://get.adobe.com/flashplayer/" />
Uložit video ve formátu <a href="{$video.download}" class="external">.mp4</a>
</object>
</p>
{if $video.download and isset($smarty.session.logged)}
<p><a href="{$video.download|escape}" class="external" rel="nofollow">Stáhnout video</a> ze stránky <a href="{if $video.originalurl}{$video.originalurl|escape}{else}http://juggling.tv{/if}" class="external">juggling.tv</a></p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.velikost} Velikost: {$video.velikost|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
{/if}
{/if}
{else}
{* odkaz na externí soubor *}
<p>
{obrazek soubor=$video.nahled popisek=$video.nazev path='/video/img/'}
<a href="{$video.link|escape}" class="external" rel="nofollow">Stáhnout video</a>
</p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.velikost} Velikost: {$video.velikost|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
{/if}
{if isset($navigace)}
<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{if isset($navigace.navod)}
	<li class="link_navod"><a href="{$navigace.navod|escape}" title="Podrobný textový návod jak se naučit {$video.nazev|escape}.">{$video.nazev|escape}</a> - podrobný návod.</li>
{/if}
{if isset($navigace.dalsi)}
	<li class="link_next">Další video: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if isset($navigace.predchozi)}
	<li class="link_prev">Předchozí video: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}
