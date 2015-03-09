{if is_array($items)}

{if isset($smarty.session.logged) and $smarty.session.logged==true}
<p><a href="{$smarty.const.DISKUSE_URL}add.php" title="Přidat nový vzkaz." class="add">Přidat zprávu</a></p>
{/if}

{if $page_numbers.total > 1 and count($items)>5}
<p>
Stránkování: {$pager_links}
</p>
{/if}
{foreach from=$items item=zprava}

<a name="{$zprava.cas|escape}"></a>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>Uživatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$zprava.autor|escape}.html" title="Podrobnosti o uživateli {$zprava.autor|escape}.">{$zprava.autor_hr|escape}</a></td>
<th>Datum</th>
<td>{$zprava.datum_hr|escape}</td>
<th>Čas</th>
<td>{$zprava.cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$zprava.text}</td></tr>
</table>
{/foreach}

{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}

{/if}
{if !isset($smarty.session.logged)}
<p>
<strong class="add">Přidat zprávu</strong> - do diskuse můžou psát jen <a href="{$smarty.const.LIDE_URL}prihlaseni.php?next={$smarty.const.DISKUSE_URL}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">přihlášení</a> uživatele žonglérova slabikáře.
</p>
<p>
<a href="{$smarty.const.LIDE_URL}novy-ucet.php" title="Vytvořit uživatelský účet." class="add">Založit nový účet</a>.
</p>
{else}
<p><a href="{$smarty.const.DISKUSE_URL}add.php" title="Přidat nový vzkaz." class="add">Přidat zprávu</a></p>
{/if}


<p>Diskusi můžeš sledovat pomocí <a href="{$smarty.const.DISKUSE_URL}zpravy.rss" title="RSS slouží k upozorňování na aktualizaci stránek.">RSS</a>.</p>
<p>Návod <a href="{$smarty.const.CALENDAR_URL}rss-a-icalendar.html#rss">jak nastavit RSS</a>.</p>
