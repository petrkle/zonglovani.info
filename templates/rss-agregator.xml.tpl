<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Žonglování</title>
    <link>http://{$smarty.server.SERVER_NAME}/rss/</link>
    <description>Novinky ze světa žonglování</description>
		<language>cs</language>
		<image>
        <url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>http://{$smarty.server.SERVER_NAME}/rss/</link>
				<title>Žonglování</title>
    </image> 
		<atom:link href="http://{$smarty.server.SERVER_NAME}/rss/agregator.xml" rel="self" type="application/rss+xml" />

{foreach from=$novinky item=udalost name=smycka2}
  <item>
    <title>{$udalost.titulek|escape}</title>
    <link>{$udalost.url|escape}</link>
    <description>{$udalost.titulek|escape} - {$udalost.rss.popis|escape}</description>
		<pubDate>{$udalost.time_mr}</pubDate>
		<guid>{$udalost.url|escape}</guid>
  </item>
{/foreach}
   </channel>
</rss>
