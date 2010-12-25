<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Návštěvnost žonglérova slabikáře</title>
    <link>http://{$smarty.server.SERVER_NAME}/stat.xml</link>
    <description>Seznam uživatelů žonglérova slabikáře</description>
		<language>cs</language>
		<image>
        <url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>http://{$smarty.server.SERVER_NAME}/stat.xml</link>
				<title>Návštěvnost žonglérova slabikáře</title>
    </image> 
		<atom:link href="http://{$smarty.server.SERVER_NAME}/stat.xml" rel="self" type="application/rss+xml" />
{if is_array($navstevnost)}
{foreach from=$navstevnost item=den}
		<item>
			<title>{$den.datum_hr|escape}</title>
			<link>http://{$smarty.server.SERVER_NAME}/statistiky.html#{$den.datum_unix|escape}</link>
			<description>Unikátní návštěvníci: {$den.vis|escape}, zobrazené stránky: {$den.pag|escape}.</description>
			<pubDate>{$den.datum_hr|escape}</pubDate>
			<guid>http://{$smarty.server.SERVER_NAME}/statistiky.html#{$den.datum_unix|escape}</guid>
		</item>
{/foreach}
{/if}
   </channel>
</rss>
