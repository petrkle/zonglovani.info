<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="http://{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>Obrázky žonglování</title>
<atom:link href="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}obrazky.xml" rel="self" type="application/rss+xml" />
<link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}</link>
<description>Obrázky žonglování</description>
<copyright>pek - {$smarty.server.SERVER_NAME}</copyright>
<image>
<url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar-fb.png</url>
<title>Obrázky žonglování</title>
<link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}</link>
</image>

{section loop=$obrazky name=smycka2 step=-1}
	{if $smarty.section.smycka2.index < 10}
  <item>
    <title>{$obrazky[$smarty.section.smycka2.index].title|escape}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazky[$smarty.section.smycka2.index].name}/</link>
    <description>{$obrazky[$smarty.section.smycka2.index].title|escape}</description>
    <author>{$obrazky[$smarty.section.smycka2.index].autor|escape}</author>
    <pubDate>{$obrazky[$smarty.section.smycka2.index].datum_rss2|escape}</pubDate>
		<guid>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazky[$smarty.section.smycka2.index].name}/</guid>
  </item>
	{/if}
{/section}

</channel></rss> 
