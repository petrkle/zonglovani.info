<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Kalendář žonglérských akcí</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}</link>
    <description>Kalendář žonglérských akcí</description>
		<language>cs</language>
		<image>
        <url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}</link>
				<title>Kalendář žonglérských akcí</title>
    </image> 
		<atom:link href="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}kalendar.xml" rel="self" type="application/rss+xml" />

{foreach from=$events item=udalost name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item>
    <title>{$udalost.title}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html</link>
    <description>{$udalost.desc}</description>
    <author>{$udalost.vlozil}</author>
    <pubDate>{$udalost.insert_rss2}</pubDate>
		<guid>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html</guid>
  </item>
	{/if}
{/foreach}
   </channel>
</rss>
