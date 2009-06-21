<table class="kalendar" cellspacing="0" cellpadding="0">
    <tr>
    	<th>Pond�l�</th>
    	<th>�ter�</th>
    	<th>St�eda</th>
    	<th>�tvrtek</th>
    	<th>P�tek</th>
    	<th>Sobota</th>
      <th>Ned�le</th>
    </tr>
    {* nested arrays month, week, day *}    
    {section name=week loop=$month} {* each week loop opens a new row *}
    <tr>
    {section name=day loop=$month[week]} {* each day loop creates a new day (will always loop 7 times) *}
    {* check if the day is empty (belongs to another month) *}
        {* if the day is empty, only display a non-breaking space in the table cell *}
        {if $month[week][day]->isEmpty()}<td class="den_prazdny">&nbsp;</td>
        {* if the day is marked as selected (contains at least one event), display the date in bold *}
    	{elseif $month[week][day]->isSelected()}
    	   <td class="den dnesni"><strong>{$month[week][day]->thisDay()}</strong>
            <ul class="kal_entry">
            {section name=entry loop=$month[week][day]->entryCount()}
            {assign var=payload value=$month[week][day]->getEntry()}
             <li><a href="udalost-{$payload.id}.html" title="{$payload.title}">{$payload.title|truncate:30:"...":false}</a></li>
            {/section}
            </ul>
</td>
    	{else}
    	{* if it is just a regular day, display it *}
           <td class="den">{$month[week][day]->thisDay()}
            <ul class="kal_entry">
            {section name=entry loop=$month[week][day]->entryCount()}
            {assign var=payload value=$month[week][day]->getEntry()}
             <li><a href="udalost-{$payload.id}.html" title="{$payload.title}">{$payload.title|truncate:30:"...":false}</a></li>
            {/section}
            </ul>
</td>
    	{/if}
    {/section}                       
    </tr>
    {/section}
		<tr>
<td class="kal_prev"  colspan="3">{if isset($prevMonth)}<a href="{if $prevMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$prevMonth}{/if}" title="Zobraz� p�edchoz� m�s�c.">&laquo; p�edchoz� m�s�c</a>{else}&nbsp;{/if}</td>
<td class="kal_akt"  colspan="2">{if !$akt}<a href="{$smarty.const.CALENDAR_URL}" title="Zobraz� aktu�ln� m�s�c.">aktu�ln� m�s�c</a>{else}&nbsp;{/if}</td>
<td class="kal_next" colspan="2">{if isset($nextMonth)}<a href="{if $nextMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$nextMonth}{/if}" title="Zobraz� dal�� m�s�c.">dal�� m�s�c &raquo;</a>{else}&nbsp;{/if}</td>
		</tr>
</table>
