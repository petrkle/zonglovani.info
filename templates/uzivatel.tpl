{if $uzivatel_props}

{if $uzivatel_props.login==$smarty.session.uzivatel.login}
<h1>Oblíbené stránky</h1>

{if is_array($uzivatel_props.oblibene)}
<ul>
{foreach from=$uzivatel_props.oblibene item=stranka key=url}
<li class="star"><a href="{$url|escape}" title="{$stranka|escape}">{$stranka|regex_replace:'/ \- stránka [0-9]+$/':''|escape}</a></li>
{/foreach}
</ul>
{else}
<p>
Na tomto místě se zobrazí tvoje oblíbené stránky z žonglérova slabikáře.
</p>
<h5>Přidání stránky mezi oblíbené</h5>
<p class="kontakt">
Stránku přidáš mezi oblíbené kliknutím na obrázek šedivé hvězdičky {obrazek soubor='star-white.png' popisek='Přidat mezi oblíbené.'} vedle nadpisu.
</p>
<h5>Odebrání stránky z oblíbených</h5>
<p class="kontakt">
Stránku odebereš z oblíbených kliknutím na obrázek žluté hvězdičky {obrazek soubor='star.png' popisek='Odebrat z oblíbených.'} vedle nadpisu.
</p>
<h5>Oblíbené stránky jsou veřejné</h5>
<p>Seznam tvých oblíbených stránek je veřejně dostupný všem návštěvníkům žonglérova slabikáře. Stejně tak i ty si můžeš prohlížet oblíbené stránky ostatních žonglérů.</p>
{/if}

<h2>Hodnocení stránek</h2>
{if is_array($uzivatel_props.hodnoceni)}
<ul>
{foreach from=$uzivatel_props.hodnoceni item=stranka key=url}
<li{if $stranka.palec==1} class="libi"{/if}{if $stranka.palec==-1} class="nelibi"{/if}><a href="{$url|escape}" title="{$stranka.titulek|escape}">{$stranka.titulek|regex_replace:'/ \- stránka [0-9]+$/':''|escape}</a></li>
{/foreach}
</ul>
{else}
<p>Na tomto místě se zobrazí stránky, které ohodnotíš v žonglérova slabikáři.</p>
<h5>Palce</h5>
<p>K hodnocení stránek se používá zelený a červený palec v dolní části stránky.</p>
<h5>Soukromí</h5>
<p>Seznam tebou hodnocených stránek není veřejný.</p>
{/if}
<ul>
<li><a href="{$smarty.const.LIDE_URL}pristupy.php" title="Seznam přihlášení do žonglérova slabikáře.">Seznam tvých přihlášení</a> do žonglérova slabikáře.</li>
<li><a href="{$smarty.const.LIDE_URL}pravidla.php" title="Pravidla pro používání žonglérova slabikáře.">Pravidla používání</a> účtu v žonglérově slabikáři</li>
</ul>
{else}

<h1><span class="fn">{$titulek}</span></h1>
<div class="vcard">
{if $uzivatel_props.foto}
<div class="szn">
<p><img src="{$smarty.const.LIDE_URL}foto/{$uzivatel_props.login|escape}.jpg" alt="{$uzivatel_props.jmeno|escape}" width="{$uzivatel_props.foto_sirka}" height="{$uzivatel_props.foto_vyska}" class="photo" /></p>
{/if}

{if strlen($uzivatel_props.vzkaz)>0}
<pre class="note">
{$uzivatel_props.vzkaz|wordwrap:45:"\n":true|escape}
</pre>
{/if}

<ul>
<li class="skryte"><span class="nickname">{$uzivatel_props.login|escape}</span></li>
{if strlen($uzivatel_props.web)>0}
<li>Web: <a href="{$uzivatel_props.web|escape}" title="Internetová stránka uživatele {$uzivatel_props.jmeno|escape}"{if !preg_match('/^http:\/\/zonglovani.info.*/',$uzivatel_props.web)} class="external url" rel="nofollow"{/if}>{$uzivatel_props.web|replace:'http://':''|regex_replace:'/^www\./':''|regex_replace:'/\/$/':''|truncate:40:'...':false|escape}</a></li>
{/if}
{if $uzivatel_props.tel}
<li>Tel.: {$uzivatel_props.tel|telobfuscate}</li>
{/if}
</ul>
{if $uzivatel_props.soukromi=='mail'}
<ul>
<li>E-mail: <span class="email">{$uzivatel_props.email|escape|mailobfuscate}</span></li>
</ul>
{else}
<form action="{$smarty.const.LIDE_URL}vzkaz.php" method="post">
<p>
<input type="hidden" name="komu" value="{$uzivatel_props.login|escape}" />
<input type="submit" name="vzkaz" value="Poslat vzkaz" />
</p>
</form>
{/if}
{if strlen($uzivatel_props.znameni)>0 and $uzivatel_props.znameni!='n'}
<ul>
<li>Znamení zvěrokruhu: <a href="/horoskop/{$uzivatel_props.znameni}.html" title="{$zverokruh[$uzivatel_props.znameni].popis} - horoskop na dnešní den.">{$zverokruh[$uzivatel_props.znameni].popis}</a></li>
</ul>
{/if}
{if $uzivatel_props.foto}
</div>
{/if}
{if is_array($uzivatel_props.dovednosti)}
<h3>Žonglérské dovednosti</h3>
<ul>
{foreach from=$uzivatel_props.dovednosti item=dov key=nazev}
<li><a href="{$smarty.const.LIDE_URL}dovednost/{$nazev}.html" title="Další žongléři kteří umí {$dovednosti[$nazev].umi}.">{$dovednosti[$nazev].nazev}</a>{if $dov.hodnota!='a' and $dov.hodnota!=1} - {$dov.hodnota|escape}{/if}</li>
{/foreach}
</ul>
{/if}

{if is_array($uzivatel_props.pusobiste)}
<h3>Kde žongluji</h3>
<ul>
{foreach from=$uzivatel_props.pusobiste item=misto}
<li class="adr"><a href="{$smarty.const.LIDE_URL}misto/{$misto}.html" title="Další žongléři {$pusobiste[$misto].odkud}." class="locality">{$pusobiste[$misto].nazev}</a></li>
{/foreach}
</ul>
{/if}

{if is_array($uzivatel_props.oblibene)}
<h3>Oblíbené stránky</h3>
<ul>
{foreach from=$uzivatel_props.oblibene item=stranka key=url}
<li><a href="{$url|escape}" title="{$stranka|escape}">{$stranka|escape}</a></li>
{/foreach}
</ul>
{/if}
<hr />
{if $navigace}
<div class="kamdal">
<a name="kam-dal"></a><h5>Seznam žonglérů</h5>
<ul>
{if $navigace.dalsi}
	<li class="link_next">Další žonglér: <a href="{$navigace.dalsi.url|escape}" title="{$navigace.dalsi.title|escape}">{$navigace.dalsi.text|escape}</a></li>
{/if}
{if $navigace.predchozi}
	<li class="link_prev">Předchozí žonglér: <a href="{$navigace.predchozi.url|escape}" title="{$navigace.predchozi.title|escape}">{$navigace.predchozi.text|escape}</a></li>
{/if}
</ul>
</div>
{/if}
</div>
{/if}
{/if}
