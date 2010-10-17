{if preg_match('/^\/.+/',$smarty.server.REQUEST_URI)}
{if $feedback}
{if $smarty.session.logged==true}
<div class="vlevo feedback">
<p class="kontakt">Hodnocení obrázku: 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI])}<a href="{$smarty.const.LIDE_URL}palec.php?zrusit&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Nehodnotím tuto stránku.">Nezadáno</a>{else}Nezadáno{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==1}{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?nahoru&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi líbí.">{obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí</a>{/if}
 ~ 
{if isset($smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI]) and $smarty.session.uzivatel.hodnoceni[$smarty.server.REQUEST_URI].palec==-1}{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí{else}<a href="{$smarty.const.LIDE_URL}palec.php?dolu&amp;url={$smarty.server.REQUEST_URI|escape}&amp;title={$titulek|escape}" title="Stránka se mi nelíbí.">{obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</a>{/if}
</p>
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
</div>
{else}
<div style="clear:both;">
<script type="text/javascript">//<![CDATA[
		document.write('<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fzongleruv.slabikar&amp;width=800&amp;colorscheme=light&amp;connections=15&amp;stream=false&amp;header=false&amp;height=160" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:800px; height:160px;" allowTransparency="true"></iframe>');
//]]></script>
</div>
{*
<p class="kontakt">Hodnocení obrázku: {obrazek soubor='palec-nahoru.png' popisek='Palec nahoru'}&nbsp;{$hodnoceni.libi|default:0}x&nbsp;líbí ~ {obrazek soubor='palec-dolu.png' popisek='Palec dolu'}&nbsp;{$hodnoceni.nelibi|default:0}x&nbsp;nelíbí</p>
<h5><a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování.">{obrazek soubor='komentar.png' popisek=''} Komentáře ke stránce</a></h5>
<p>Obrázky můžou hodnotit a komentovat <a href="{$smarty.const.LIDE_URL}prihlaseni.php{if $smarty.server.REQUEST_URI!="/"}?next={$smarty.server.REQUEST_URI}#hodnoceni{/if}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">přihlášení</a> uživatelé.</p>
*}
{/if}
{/if}
{/if}

{if $obrazek.dalsi_cislo}
{literal}
<script type="text/javascript">
		<!--//--><![CDATA[//><!--
function preloader() {
	if (document.images) {
{/literal}
{if $obrazek.dalsi_cislo}
		var img1 = new Image();
		img1.src = "http://i.{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.dalsi_cislo}.jpg";
{/if}
{if $obrazek.dalsi_cislo2}
		var img2 = new Image();
		img2.src = "http://i.{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.dalsi_cislo2}.jpg";
{/if}
{if $obrazek.dalsi_cislo3}
		var img3 = new Image();
		img3.src = "http://i.{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.dalsi_cislo3}.jpg";
{/if}
{literal}
	}
}
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
			func();
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
setTimeout(function() {
addLoadEvent(preloader);
}, 2000); 

document.onkeydown = KeyPressHappened;

function KeyPressHappened(e)
{
  if (!e) e=window.event;
  var code;
  if ((e.charCode) && (e.keyCode==0))
    code = e.charCode
  else
    code = e.keyCode;
	if(code==39){
{/literal}{if $obrazek.dalsi_cislo}
		window.top.location.href="{if $obrazek.dalsi_stranka!=1}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.dalsi_stranka}/{$obrazek.dalsi_cislo}{else}{$obrazek.dalsi_cislo|escape}{/if}.html#nahore";
{/if}{literal}
	}
	if(code==37){
{/literal}{if $obrazek.predchozi_cislo}
		window.top.location.href="{if $obrazek.predchozi_stranka}{$smarty.const.OBRAZKY_URL}{$gal_id}/stranka{$obrazek.predchozi_stranka}/{$obrazek.predchozi_cislo}{else}{$smarty.const.OBRAZKY_URL}{$gal_id}/{$obrazek.predchozi_cislo|escape}{/if}.html#nahore";
{/if}{literal}
	}
}

		//--><!]]>
	</script>
{/literal}
{/if}
{include file='paticka-common.tpl'}
