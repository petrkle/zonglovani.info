<table class="kalendar" cellspacing="0" cellpadding="0">
		<tr>
<td class="kal_prev"  colspan="5">{if isset($prevMonth)}<a href="{if $prevMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$prevMonth}{/if}" title="Zobrazí předchozí měsíc.">&laquo; Předchozí měsíc</a>{else}&nbsp;{/if}</td>
<td class="kal_next" colspan="2">{if isset($nextMonth)}<a href="{if $nextMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$nextMonth}{/if}" title="Zobrazí další měsíc.">Další měsíc &raquo;</a>{else}&nbsp;{/if}</td>
		</tr>
<caption>{$caption|escape}</caption>
    <tr>
    	<th>Pondělí</th>
    	<th>Úterý</th>
    	<th>Středa</th>
    	<th>Čtvrtek</th>
    	<th>Pátek</th>
    	<th>Sobota</th>
      <th>Neděle</th>
    </tr>
    {* nested arrays month, week, day *}    
    {section name=week loop=$month}
    <tr>
    {section name=day loop=$month[week]}
      {if $month[week][day]->isEmpty()}<td class="den_prazdny">&nbsp;</td>
    	{elseif $month[week][day]->isSelected()}
				{assign var=cislodne value=$month[week][day]->thisDay()}
    	   <td class="den udalost{if $cislodne==$dnesek} dnesni{/if}"><strong>{$cislodne}</strong>
						{if $month[week][day]->entryCount()>0}
            <ul class="kal_entry">
            {section name=entry loop=$month[week][day]->entryCount()}
            {assign var=payload value=$month[week][day]->getEntry()}
             <li class="vevent"><a href="udalost-{$payload.id}.html" title="{$payload.title}" {if $payload.vlozil==$smarty.session.uzivatel.login}class="edit"{/if}>{$payload.title|truncate:20:"...":false}</a><span class="skryte"><span class="summary">{$payload.title|escape}</span><span class="description">{$payload.desc|escape}</span><abbr class="dtstart" title="{$payload.start_ical|escape}">Začátek: {$payload.start_hr|escape}</abbr><abbr class="dtend" title="{$payload.end_ical|escape}">Konec: {$payload.end_hr|escape}</abbr></span></li>
            {/section}
            </ul>
					{else}&nbsp;{/if}
</td>
    	{else}
        <td class="den">{$month[week][day]->thisDay()}</td>
    	{/if}
    {/section}                       
    </tr>
    {/section}
		<tr>
<td class="kal_prev"  colspan="5">{if isset($prevMonth)}<a href="{if $prevMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$prevMonth}{/if}" title="Zobrazí předchozí měsíc.">&laquo; Předchozí měsíc</a>{else}&nbsp;{/if}</td>
<td class="kal_next" colspan="2">{if isset($nextMonth)}<a href="{if $nextMonth==$aktMonth}{$smarty.const.CALENDAR_URL}{else}{$nextMonth}{/if}" title="Zobrazí další měsíc.">Další měsíc &raquo;</a>{else}&nbsp;{/if}</td>
		</tr>
</table>
<p>
Dnes je: {if $dnesek}{$aktDate}{else}<a href="{$smarty.const.CALENDAR_URL}" title="Zobrazí aktuální měsíc.">{$aktDate}</a>{/if}
</p>
<p>

<a name="add"></a>
{if $smarty.session.logged!=true}
<strong class="add">Přidat novou</strong> událost - do kalendáře můžou psát jen <a href="{$smarty.const.LIDE_URL}prihlaseni.php?next={$smarty.const.CALENDAR_URL}" title="Přihlášení do žonglérova slabikáře" rel="nofollow">přihlášení</a> uživatele žonglérova slabikáře.
{else}
<a href="{$smarty.const.CALENDAR_URL}add.php" title="Přidat novou událost do kalendáře." class="add">Přidat novou</a> událost.
{/if}
</p>
{if $smazane}
<h3>Smazané události</h3>
<ul>
{foreach from=$smazane item=udalost}
<li><a href="smazane-{$udalost.id|escape}.html" title="Zobrazit smazanou událost.">{$udalost.title|escape}</a></li>
{/foreach}
</ul>
{/if}
<p>Kalendář můžeš sledovat pomocí <a href="{$smarty.const.CALENDAR_URL}kalendar.xml" title="RSS kanál">RSS</a> <a class="info" href="#">?<span class="tooltip">RSS slouží k upozorňování na aktualizaci stránek.</span></a> a <a href="{$smarty.const.CALENDAR_URL}kalendar.ics" title="Ical export">iCalendar</a> <a class="info" href="#">?<span class="tooltip">iCalendar je formát pro výměnu záznamů v kalendáři mezi počítači.</span></a>.</p>
<p>Návod <a href="rss-a-icalendar.html">jak nastavit RSS a iCalendar</a>.</p>

{if preg_match('/.*AppleWebKit.*Chrome.*/',$smarty.server.HTTP_USER_AGENT)}
<div class="cleaner">&nbsp;</div>
<p><a href="https://chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad" onclick="pageTracker._trackPageview('/goto/chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad');">{obrazek soubor="browser-chrome.png" popisek="Google Chrome"}</a>Používáš Google Chrome? Vyzkoušej <a href="https://chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad" class="external" onclick="pageTracker._trackPageview('/goto/chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad');">rozšíření pro kalendář</a> do prohlížeče.</p>
{/if}

{if preg_match('/.*opera.*/i',$smarty.server.HTTP_USER_AGENT)}
<div class="cleaner">&nbsp;</div>
<p><a href="https://addons.opera.com/addons/extensions/details/zonglovani/?display=cs" onclick="pageTracker._trackPageview('/goto/addons.opera.com/addons/extensions/details/zonglovani');">{obrazek soubor="browser-opera.png" popisek="Opera"}</a>Používáš Operu? Vyzkoušej <a href="https://addons.opera.com/addons/extensions/details/zonglovani/?display=cs" class="external" onclick="pageTracker._trackPageview('/goto/addons.opera.com/addons/extensions/details/zonglovani');">rozšíření pro kalendář</a> do prohlížeče.</p>
{/if}
<p>
<a href="widget.html" title="Widget na webové stránky">Výpis z kalendáře</a> na tvém webu.
</p>
