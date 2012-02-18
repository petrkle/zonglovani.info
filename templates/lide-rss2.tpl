<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Seznam žonglérů</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}</link>
    <description>Seznam uživatelů žonglérova slabikáře</description>
		<language>cs</language>
		<image>
        <url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}</link>
				<title>Seznam žonglérů</title>
    </image> 
		<atom:link href="http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}uzivatele.xml" rel="self" type="application/rss+xml" />
{foreach from=$uzivatele item=uzivatel name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
		<item>
			<title>{$uzivatel.jmeno|escape}</title>
			<link>http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$uzivatel.login}.html</link>
			<description>{$uzivatel.jmeno|escape} - nový uživatel žonglérova slabikáře.</description>
			<pubDate>{$uzivatel.registrace_rss2}</pubDate>
			<guid>http://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$uzivatel.login}.html</guid>
		</item>
	{/if}
{/foreach}
   </channel>
</rss>
