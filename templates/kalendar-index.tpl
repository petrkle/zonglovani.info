{if $smarty.session.logged==true}
<p>
<a href="{$smarty.const.CALENDAR_URL}add.php" title="Přidat novou událost do kalendáře." class="add">Přidat novou</a> událost.
</p>
{/if}
<table class="kalendar" cellspacing="0" cellpadding="0">
		<tr>
<td colspan="3" class="kalnav">{include file='kalendar-mon-nav.tpl'}</td></tr>
<caption>{$caption|escape}</caption>
    {* nested arrays month, week, day *}    
    {section name=week loop=$month}
    {section name=day loop=$month[week]}
    
      {if $month[week][day]->isEmpty()}
    	{elseif $month[week][day]->isSelected()}
				{assign var=cislodne value=$month[week][day]->thisDay()}
    	   <tr><td class="kal_week_day wd_{$smarty.section.day.index}">{$dny_zkratky[$smarty.section.day.index]}</td><td class="kal_week_day"><strong class="cislodne">{$cislodne}</strong></td><td class="den udalost{if $cislodne==$dnesek} dnesni{/if}">
						{if $month[week][day]->entryCount()>0}
            <ul class="kal_entry">
            {section name=entry loop=$month[week][day]->entryCount()}
            {assign var=payload value=$month[week][day]->getEntry()}
             <li class="vevent"><a href="udalost-{$payload.id}.html" title="{$payload.title}" {if $payload.vlozil==$smarty.session.uzivatel.login}class="edit"{/if}>{$payload.title|truncate:80:"...":false|escape}</a><span class="skryte"><span class="summary">{$payload.title|escape}</span><span class="description">{$payload.desc|escape}</span><abbr class="dtstart" title="{$payload.start_ical|escape}">Začátek: {$payload.start_hr|escape}</abbr><abbr class="dtend" title="{$payload.end_ical|escape}">Konec: {$payload.end_hr|escape}</abbr></span></li>
            {/section}
            </ul>
					{else}&nbsp;{/if}
</td></tr>
    	{else}
        <td class="kal_week_day wd_{$smarty.section.day.index}">{$dny_zkratky[$smarty.section.day.index]}</td><td class="kal_week_day">{$month[week][day]->thisDay()}</td><td class="den">&nbsp;</td></tr>
    	{/if}
    
    {/section}                       
    {/section}
		<tr>

<td colspan="3" class="kalnav">{include file='kalendar-mon-nav.tpl'}</td></tr>

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
<p>Kalendář můžeš sledovat pomocí <a href="{$smarty.const.CALENDAR_URL}kalendar.xml" title="RSS slouží k upozorňování na aktualizaci stránek.">RSS</a> a <a href="{$smarty.const.CALENDAR_URL}zonglovani.ics" title="iCalendar je formát pro výměnu záznamů v kalendáři mezi počítači.">iCalendar</a>.</p>
<p>Návod <a href="rss-a-icalendar.html">jak nastavit RSS a iCalendar</a>.</p>

{if preg_match('/.*AppleWebKit.*Chrome.*/',$smarty.server.HTTP_USER_AGENT)}
<div class="cleaner">&nbsp;</div>
<p><a href="https://chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad" onclick="_gaq.push(['_trackPageview','/goto/chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad']);">{obrazek soubor="browser-chrome.png" popisek="Google Chrome"}</a>Používáš Google Chrome? Vyzkoušej <a href="https://chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad" class="external" onclick="_gaq.push(['_trackPageview','/goto/chrome.google.com/extensions/detail/dojgpamkkdlccihbhgnflimdjkigimad']);">rozšíření pro kalendář</a> do prohlížeče.</p>
{/if}

{if preg_match('/.*opera.*/i',$smarty.server.HTTP_USER_AGENT)}
<div class="cleaner">&nbsp;</div>
<p><a href="https://addons.opera.com/addons/extensions/details/zonglovani/?display=cs" onclick="_gaq.push(['_trackPageview','/goto/addons.opera.com/addons/extensions/details/zonglovani']);">{obrazek soubor="browser-opera.png" popisek="Opera"}</a>Používáš Operu? Vyzkoušej <a href="https://addons.opera.com/addons/extensions/details/zonglovani/?display=cs" class="external" onclick="_gaq.push(['_trackPageview','/goto/addons.opera.com/addons/extensions/details/zonglovani']);">rozšíření pro kalendář</a> do prohlížeče.</p>
{/if}
<p>
<a href="widget.html" title="Widget na webové stránky">Výpis z kalendáře</a> na tvém webu.
</p>
