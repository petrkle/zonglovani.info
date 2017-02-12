{if isset($video)}
<p>{$video.popis}</p>
{/if}

{if $video.typ!='file'}
{if $video.typ=='youtube.com'}
<p class="youtubevideo">
<iframe id='player' type='text/html' class='youtubevideo' src='https://www.youtube.com/embed/{$video.fid|escape}?origin=https://{$smarty.server.SERVER_NAME}&autohide=1&rel=0&showinfo=O&fs=0&controls=1&modestbranding=1' frameborder='0'></iframe>
</p>
<p>
{if $video.delka}Délka: {$video.delka|escape}{/if}{if $video.rozliseni} Rozlišení: {$video.rozliseni|escape}{/if}
</p>
<p>
Adresa videa: <a href="https://youtu.be/{$video.fid|escape}" class="external">youtu.be/{$video.fid|escape}</a>
</p>
{/if}

{if $video.typ=='juggling.tv'}
<p class="{if $event=='navod'}wyoutubevideo{else}youtubevideo{/if}">
Uložit video ve formátu <a href="{$video.download}" class="external">.mp4</a>
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
	<li class="link_next">Další video: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}" id="dalsi">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if isset($navigace.predchozi)}
	<li class="link_prev">Předchozí video: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}" id="predchozi">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
<script async src="/hop-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}
