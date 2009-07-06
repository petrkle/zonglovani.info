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
				{assign var=cislodne value=$month[week][day]->thisDay()}
    	   <td class="den udalost{if $cislodne==$dnesek} dnesni{/if}"><strong>{$cislodne}</strong>
            <ul class="kal_entry">
            {section name=entry loop=$month[week][day]->entryCount()}
            {assign var=payload value=$month[week][day]->getEntry()}
             <li><a href="udalost-{$payload.id}.html" title="{$payload.title}"{if $payload.vlozil==$smarty.session.uzivatel.login} class="edit"{/if}>{$payload.title|truncate:30:"...":false}</a></li>
            {/section}
            </ul>
</td>
    	{else}
    	{* if it is just a regular day, display it *}
           <td class="den">{$month[week][day]->thisDay()}</td>
    	{/if}
    {/section}                       
    </tr>
    {/section}
		<tr>
<td class="kal_prev"  colspan="5">{if isset($prevMonth)}<a href="{if $prevMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$prevMonth}{/if}" title="Zobraz� p�edchoz� m�s�c.">&laquo; p�edchoz� m�s�c</a>{else}&nbsp;{/if}</td>
<td class="kal_next" colspan="2">{if isset($nextMonth)}<a href="{if $nextMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$nextMonth}{/if}" title="Zobraz� dal�� m�s�c.">dal�� m�s�c &raquo;</a>{else}&nbsp;{/if}</td>
		</tr>
</table>
<p>
Dnes je: {if $dnesek}{$aktDate}{else}<a href="{$smarty.const.CALENDAR_URL}" title="Zobraz� aktu�ln� m�s�c.">{$aktDate}</a>{/if}
</p>
<p>
P�idat <a href="{$smarty.const.CALENDAR_URL}add.php" title="P�idat novou ud�lost do kalend��e.">novou ud�lost</a>.
</p>
{if $smazane}
<h3>Smazan� ud�losti</h3>
<ul>
{foreach from=$smazane item=udalost}
<li><a href="smazane-{$udalost.id|escape}.html" title="Zobrazit smazanou ud�lost.">{$udalost.title|escape}</a></li>
{/foreach}
</ul>
{/if}
