{if isset($udalost)}
<div class="vevent">
<span class="skryte summary">{$udalost.title|escape}</span>
{if $stare}
<ul class="alert"><li><strong>Pozor:</strong> tato událost už skončila.</li></ul>
{/if}

{if $udalost.img}
<p><img src="/kalendar/obrazek-{$udalost.img|escape}" alt="{$udalost.desc|escape}" width="{$udalost.img_sirka|escape}" height="{$udalost.img_vyska|escape}" /></p>
{/if}

<p><strong>Začátek</strong>: <abbr class="dtstart" title="{$udalost.start_micro|escape}">{$udalost.start_hr|escape}</abbr></p>
<p><strong>Konec:</strong> <abbr class="dtend" title="{$udalost.end_micro|escape}">{$udalost.end_hr|escape}</abbr></p>
<p><strong>Popis</strong>: <span class="description">{$udalost.desc|escape}</span></p>
<p><strong>Místo</strong>: <span class="location">{$udalost.misto|escape}</span>{if $udalost.mapa} - <a href="{$udalost.mapa|escape}" title="Místo konání na mapě."{if preg_match('/^http:\/\//',$udalost.mapa)} class="external" rel="nofollow"{/if}>mapa</a>{/if}</p>

{if $udalost.url}
<p><strong>Odkaz</strong>: <a href="{$udalost.url_hr|escape}" {if preg_match('/^http:\/\//',$udalost.url_hr)} class="external url" rel="nofollow"{/if}>{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a></p>
{/if}

{if $udalost.vlozil==$smarty.session.uzivatel.login and !$stare}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<p>
{if isset($smarty.get.deleted)}
<input type="hidden" name="id" value="{$udalost.id|escape}" />
<input type="hidden" name="deleted" />
<input type="submit" name="restore" value="Obnovit" class="knoflik" />
<input type="submit" name="shred" value="Smazat nadobro" class="knoflik" />
{else}
<input type="hidden" name="id" value="{$udalost.id|escape}" />
<input type="submit" name="odeslat" value="Upravit" class="knoflik" />
<input type="submit" name="smazat" value="Smazat" class="knoflik" />
{/if}
</p>
</form>
{else}
<p><strong>Vložil</strong>: <a href="{$smarty.const.LIDE_URL}{$udalost.vlozil|escape}.html" title="Podrobnosti o {$udalost.vlozil|escape}">{$udalost.vlozil_hr|escape}</a> {$udalost.insert_hr|escape}</p>
{if isset($udalost.update) and $udalost.update_hr!=$udalost.insert_hr}
<p><strong>Poslední úprava</strong>: {$udalost.update_hr|escape}</p>
{/if}
{if $trash}
<form action="{$smarty.server.SCRIPT_NAME}" method="post">
<p>
<input type="hidden" name="id" value="{$udalost.id|escape}" />
<input type="hidden" name="deleted" />
<input type="submit" name="shred" value="Smazat nadobro" class="knoflik" />
</p>
</form>
{/if}

{/if}
</div>
{/if}
{include file='kalendar-kamdal.tpl'}
