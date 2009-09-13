{if is_array($zpravy)}
{foreach from=$items item=zprava}

<a name="{$zprava.cas|escape}"></a>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>U�ivatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$zprava.autor|escape}.html" title="Podrobnosti o u�ivateli {$zprava.autor|escape}.">{$zprava.autor|escape}</a></td>
<th>Datum</th>
<td>{$zprava.datum_hr|escape}</td>
<th>�as</th>
<td>{$zprava.cas_hr|escape}</td>
</tr>
<tr><td colspan="6">{$zprava.text|wordwrap:50:"\n":true|escape|nl2br}</td></tr>
</table>
{/foreach}
{/if}

<p><a href="{$smarty.const.DISKUSE_URL}add.php" title="P�idat nov� vzkaz.">P�idat zpr�vu</a></p>

{if $page_numbers.total > 1}
<p>
Str�nkov�n�: {$pager_links}
</p>
{/if}

<p>Diskusi m��e� sledovat pomoc� <a href="{$smarty.const.DISKUSE_URL}zpravy.rss" title="RSS kan�l">RSS</a> <a class="info" href="#">?<span class="tooltip">RSS slou�� k upozor�ov�n� na aktualizaci str�nek.</span></a></p>
<p>N�vod <a href="{$smarty.const.CALENDAR_URL}rss-a-icalendar.html#rss">jak nastavit RSS</a>.</p>
