{if preg_match('/^\/.+/',$smarty.server.REQUEST_URI)}
<a name="hodnoceni"></a><h5>Hodnocení stránky</h5>
{if $smarty.session.logged==true}
<p class="kontakt">
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI])}<a href="{$smarty.const.LIDE_URL}palec.php?zrusit&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Nehodnotím tuto stránku.">Nezadáno</a>{else}Nezadáno{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==1}{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?nahoru&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi líbí.">{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí</a>{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==-1}{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?dolu&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi nelíbí.">{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</a>{/if}
</p>
{if !preg_match('/(prihlaseni|diskuse)/',$smarty.server.REQUEST_URI)}
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
{/if}
{else}
<p class="kontakt">{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí ~ {obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</p>
{if !preg_match('/(prihlaseni|diskuse)/',$smarty.server.REQUEST_URI)}
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
<p>Stránky můžou hodnotit a komentovat <a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI}#hodnoceni{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">přihlášení</a> uživatelé.</p>
{/if}
{/if}
{/if}
<!-- obsah konec -->
</div>

<div id="menu">

{vypismenu}

</div>

<!-- ramecek konec -->
</div>

{include file='paticka-common.tpl'}
