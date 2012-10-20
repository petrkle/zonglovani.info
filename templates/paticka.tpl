{if $dalsi}

<div class="kamdal">
<a name="kam-dal"></a><h5>Kam dál</h5>
<ul>
{foreach from=$dalsi item=odkaz}
<li><a href="{$odkaz.url|escape}"{if $odkaz.title} title="{$odkaz.title|escape}"{/if}{if preg_match('/^(http:\/\/|\/g\/)/',$odkaz.url)} class="external"  onclick="_gaq.push(['_trackPageview','/goto/{$odkaz.url|replace:'http://':''|regex_replace:'/^www\./':''|regex_replace:'/^\//':''|escape}']);"{/if}>{$odkaz.text|escape}</a></li>
{/foreach}
</ul>
</div>
{/if}
{if $feedback}

<!-- start -->
<div class="feedback">
{if $hodnoceni.libi!=0 or $hodnoceni.nelibi!=0 or $smarty.session.logged==true}
<a name="hodnoceni"></a><h5>Hodnocení stránky</h5>
{/if}
{if $smarty.session.logged==true}
<p class="kontakt">
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI])}<a href="{$smarty.const.LIDE_URL}palec.php?zrusit&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Nehodnotím tuto stránku.">Nezadáno</a>{else}Nezadáno{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==1}{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?nahoru&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi líbí.">{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí</a>{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==-1}{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?dolu&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi nelíbí.">{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</a>{/if}
</p>
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
{include file='fbuton.tpl'}
{else}

{if $hodnoceni.libi!=0 or $hodnoceni.nelibi!=0}
<p class="kontakt">{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí ~ {obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</p>
{/if}
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
{include file='fbuton.tpl'}
{/if}
</div>
<!-- stop -->
{/if}
<!-- obsah konec -->
</div>

<div id="menu">

{vypismenu}

</div>

<!-- ramecek konec -->
</div>

{include file='paticka-common.tpl'}
