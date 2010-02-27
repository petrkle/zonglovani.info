{if $uzivatel_props}

{if $uzivatel_props.login==$smarty.session.uzivatel.login}
<h1>Oblíbené stránky</h1>

{if is_array($uzivatel_props.oblibene)}
<ul>
{foreach from=$uzivatel_props.oblibene item=stranka key=url}
<li><a href="{$url|escape}" title="{$stranka|escape}">{$stranka|escape}</a></li>
{/foreach}
</ul>
{else}
<p>
Na této stránce se zobrazí tvoje oblíbené stránky z žonglérova slabikáře.
</p>
<h3>Přidání stránky mezi oblíbené</h3>
<p class="kontakt">
Stránku přidáš mezi oblíbené kliknutím na obrázek šedivé hvězdičky {obrazek soubor='star-white.png' popisek='Přidat mezi oblíbené.'} vedle nadpisu.
</p>
<h3>Odebrání stránky z oblíbených</h3>
<p class="kontakt">
Stránku odebereš z oblíbených kliknutím na obrázek žluté hvězdičky {obrazek soubor='star.png' popisek='Odebrat z oblíbených.'} vedle nadpisu.
</p>
<h3>Oblíbené stránky jsou veřejné</h3>
<p>Seznam tvých oblíbených stránek je veřejně dostupný všem návštěvníkům žonglérova slabikáře. Stejně tak i ty si můžeš prohlížet oblíbené stránky ostatních žonglérů.</p>
{/if}

{else}

<h1>{$titulek}</h1>
{if $uzivatel_props.foto}
<p><img src="{$smarty.const.LIDE_URL}foto/{$uzivatel_props.login|escape}.jpg" alt="{$uzivatel_props.jmeno|escape}" width="{$uzivatel_props.foto_sirka}" height="{$uzivatel_props.foto_vyska}"/></p>
{/if}

{if strlen($uzivatel_props.vzkaz)>0}
<pre>
{$uzivatel_props.vzkaz|wordwrap:45:"\n":true|escape}
</pre>
{/if}

<ul>
<li>Jméno: {$uzivatel_props.jmeno|escape}</li>
<li>Login: {$uzivatel_props.login|escape}</li>
{if strlen($uzivatel_props.web)>0}
<li>Web: <a href="{$uzivatel_props.web|escape}" title="Internetová stránka uživatele {$uzivatel_props.jmeno|escape}"{if !preg_match('/^http:\/\/zonglovani.info.*/',$uzivatel_props.web)} class="external" rel="nofollow"{/if}>{$uzivatel_props.web|replace:'http://':''|regex_replace:'/^www\./':''|regex_replace:'/\/$/':''|truncate:40:'...':false|escape}</a></li>
{/if}
<li>Účet vytvořen: {$uzivatel_props.registrace_hr|escape}</li>
{if $uzivatel_props.tel}
<li>Tel.: {$uzivatel_props.tel|telobfuscate}</li>
{/if}
</ul>
{if $uzivatel_props.soukromi=='mail'}
<ul>
<li>E-mail: {$uzivatel_props.email|escape|mailobfuscate}</li>
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
<li><a href="{$smarty.const.LIDE_URL}misto/{$misto}.html" title="Další žongléři {$pusobiste[$misto].odkud}.">{$pusobiste[$misto].nazev}</a></li>
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
<p>
<a href="{$smarty.const.LIDE_URL}" title="Seznam uživatelů žonglérova slabikáře.">Další žongléři a žonglérky &raquo;</a>
</p>
{/if}
{/if}
