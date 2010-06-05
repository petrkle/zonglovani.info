<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Změny v žonglérově slabikáři</title>
    <link>http://{$smarty.server.SERVER_NAME}/changelog.html</link>
    <description>Seznam změn v žonglérově slabikáři</description>
		<language>cs</language>
		<image>
        <url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>http://{$smarty.server.SERVER_NAME}/changelog.html</link>
				<title>Změny v žonglérově slabikáři</title>
    </image> 
		<atom:link href="http://{$smarty.server.SERVER_NAME}/ostatni/changelog.xml" rel="self" type="application/rss+xml" />

{foreach from=$zmeny item=zmena name=smycka2}
{if $smarty.foreach.smycka2.index < 10}
  <item>
    <title>{$zmena.popis|truncate:30:'':false}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$zmena.link}</link>
    <description>{$zmena.popis}</description>
    <author>{$zmena.autor}</author>
    <pubDate>{$zmena.time_rss2}</pubDate>
    <guid>http://{$smarty.server.SERVER_NAME}{$zmena.link}</guid>
  </item>
{/if}
{/foreach}
   </channel>
</rss>
