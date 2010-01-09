{if isset($udalost)}
{if $stare}
<ul class="alert"><li><strong>Pozor:</strong> tato událost už skončila.</li></ul>
{/if}
<p><strong>Začátek</strong>: {$udalost.start_hr|escape}</p>
<p><strong>Konec:</strong> {$udalost.end_hr|escape}</p>
<p><strong>Popis</strong>: {$udalost.desc|escape}</p>
<p><strong>Místo</strong>: {$udalost.misto|escape}{if $udalost.mapa} - <a href="{$udalost.mapa|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.mapa|replace:'http://':''|regex_replace:"/^www\./":""}');" title="Místo konání na mapě."{if eregi("^http://",$udalost.mapa)} class="external" rel="nofollow"{/if}>mapa</a>{/if}</p>

{if $udalost.url}
<p><strong>Odkaz</strong>: <a href="{$udalost.url_hr|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.url_hr|replace:'http://':''|regex_replace:"/^www\./":""}');"{if eregi("^http://",$udalost.url_hr)} class="external" rel="nofollow"{/if}>{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a></p>
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
<p><strong>Vložil</strong>: <a href="{$smarty.const.LIDE_URL}{$udalost.vlozil|escape}.html" title="Podrobnosti o {$udalost.vlozil|escape}">{$udalost.vlozil|escape}</a> {$udalost.insert_hr|escape}</p>
{if isset($udalost.update) and $udalost.update_hr!=$udalost.insert_hr}
<p><strong>Poslední úprava</strong>: {$udalost.update_hr|escape}</p>
{/if}

{/if}

<p class="sdileni">
{include file='sdileni.tpl'}
</p>

{/if}

<p>
<a href="{$udalost.month_url}" title="Návrat do kalendáře.">&laquo; Zpět do kalendáře</a>
</p>
