{if isset($udalost)}
{if $stare}
<ul class="alert"><li><strong>Pozor:</strong> tato ud�lost u� skon�ila.</li></ul>
{/if}
<p><strong>Za��tek</strong>: {$udalost.start_hr|escape}</p>
<p><strong>Konec:</strong> {$udalost.end_hr|escape}</p>
<p><strong>Popis</strong>: {$udalost.desc|escape}</p>
<p><strong>M�sto</strong>: {$udalost.misto|escape}{if $udalost.mapa} - <a href="{$udalost.mapa|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.mapa|replace:'http://':''|regex_replace:"/^www\./":""}');" title="M�sto kon�n� na map�."{if eregi("^http://",$udalost.mapa)} class="external" rel="nofollow"{/if}>mapa</a>{/if}</p>

{if $udalost.url}
<p><strong>Odkaz</strong>: <a href="{$udalost.url|escape}" onclick="pageTracker._trackPageview('/goto/{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""}');"{if eregi("^http://",$udalost.url)} class="external" rel="nofollow"{/if}>{$udalost.url|replace:'http://':''|regex_replace:"/^www\./":""|regex_replace:"/\/$/":""|truncate:40:"...":false|escape}</a></p>
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
<p><strong>Vlo�il</strong>: <a href="{$smarty.const.LIDE_URL}{$udalost.vlozil|escape}.html" title="Podrobnosti o {$udalost.vlozil|escape}">{$udalost.vlozil|escape}</a> {$udalost.insert_hr|escape}</p>
{if isset($udalost.update) and $udalost.update_hr!=$udalost.insert_hr}
<p><strong>Posledn� �prava</strong>: {$udalost.update_hr|escape}</p>
{/if}

{/if}


{/if}

<p>
<a href="{$udalost.month_url}" title="N�vrat do kalend��e.">&laquo; zp�t do kalend��e</a>
</p>
