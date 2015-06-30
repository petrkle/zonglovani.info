{literal}<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="https://{/literal}{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
   <channel>
    <title>Diskuse o žonglování</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}</link>
    <description>Diskuse o žonglování</description>
		<language>cs</language>
		<image>
        <url>https://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}</link>
				<title>Diskuse o žonglování</title>
    </image> 
		<atom:link href="https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}zpravy.xml" rel="self" type="application/rss+xml" />

{section loop=$zpravy name=smycka2 step=-1}
	{if $smarty.section.smycka2.rownum < 10}
  <item>
    <title>{$zpravy[$smarty.section.smycka2.index].text|strip_tags:false|truncate:30:"...":false|escape}</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$zpravy[$smarty.section.smycka2.index].stranka}.html#{$zpravy[$smarty.section.smycka2.index].cas}</link>
    <description>{$zpravy[$smarty.section.smycka2.index].text|escape}</description>
    <author>{$zpravy[$smarty.section.smycka2.index].autor|escape}</author>
    <pubDate>{$zpravy[$smarty.section.smycka2.index].cas_rss2}</pubDate>
		<guid>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$zpravy[$smarty.section.smycka2.index].stranka}.html#{$zpravy[$smarty.section.smycka2.index].cas}</guid>
  </item>
	{/if}
{/section}
   </channel>
</rss>
