{literal}<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="http://{/literal}{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
 <title>Žonglérův slabikář</title>
 <link>https://{$smarty.server.SERVER_NAME}/</link>
 <description>Žonglérův slabikář</description>
 <language>cs</language>
 <image>
   <url>https://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
   <link>https://{$smarty.server.SERVER_NAME}/</link>
   <title>Žonglérův slabikář</title>
 </image> 
<atom:link href="https://{$smarty.server.SERVER_NAME}/zonglovani.xml" rel="self" type="application/rss+xml" />

{foreach from=$udalosti item=udalost name=smycka2}
{if $smarty.foreach.smycka2.index < 10}
<item>
 <title>{$udalost.title|escape}</title>
 <link>{$udalost.link}</link>
 <description>{$udalost.description|escape}</description>
 <pubDate>{$udalost.datum_rss2}</pubDate>
 <guid>{$udalost.link}</guid>
</item>

{/if}
{/foreach}
</channel>
</rss>
