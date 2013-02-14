<table class="subtable" style="width:100%;" cellspacing="0" cellpadding="0">
<tr>
<td class="kal_prev">
{if isset($prevMonth)}<a href="{if $prevMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$prevMonth}{/if}" title="Zobrazí předchozí měsíc.">&laquo; Předchozí měsíc</a>{else}&nbsp;{/if}</td>
<td class="kal_next">{if isset($nextMonth)}<a href="{if $nextMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$nextMonth}{/if}" title="Zobrazí další měsíc.">Další měsíc &raquo;</a>{else}&nbsp;{/if}</td>
</tr>
</table>
