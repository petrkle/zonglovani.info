{if is_array($zpravy)}
{foreach from=$items item=zprava}

<a name="{$zprava.cas|escape}"></a>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>U¾ivatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$zprava.autor|escape}.html" title="Podrobnosti o u¾ivateli {$zprava.autor|escape}.">{$zprava.autor|escape}</a></td>
<th>Datum</th>
<td>{$zprava.datum_hr|escape}</td>
<th>Èas</th>
<td>{$zprava.cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$zprava.text|wordwrap:50:"\n":true|escape|nl2br}</td></tr>
</table>
{/foreach}
{/if}

<p><a href="{$smarty.const.DISKUSE_URL}add.php" title="Pøidat nový vzkaz.">Pøidat zprávu</a></p>

{if $page_numbers.total > 1}
<p>
Stránkování: {$pager_links}
</p>
{/if}

<p>Diskusi mù¾e¹ sledovat pomocí <a href="{$smarty.const.DISKUSE_URL}zpravy.rss" title="RSS kanál">RSS</a> <a class="info" href="#">?<span class="tooltip">RSS slou¾í k upozoròování na aktualizaci stránek.</span></a></p>
<p>Návod <a href="{$smarty.const.CALENDAR_URL}rss-a-icalendar.html#rss">jak nastavit RSS</a>.</p>
