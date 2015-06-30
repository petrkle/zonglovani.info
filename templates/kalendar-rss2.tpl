{literal}<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="https://{/literal}{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/">
   <channel>
    <title>Kalendář žonglérských akcí</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}</link>
    <description>Kalendář žonglérských akcí</description>
		<language>cs</language>
		<image>
        <url>https://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
        <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}</link>
				<title>Kalendář žonglérských akcí</title>
    </image> 
		<atom:link href="https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}kalendar.xml" rel="self" type="application/rss+xml" />

{foreach from=$events item=udalost name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item>
    <title>{$udalost.title|escape}</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id|escape}.html</link>
{if isset($udalost.img)}
<description>
<![CDATA[
<p>
<div style="float:left;margin:0 5px;">
<img src="https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}obrazek-{$udalost.img}" />
</div>
{$udalost.desc|escape}
<br clear="both"/>
</p>
]]>
</description>
{else}
    <description>{$udalost.desc|escape}</description>
{/if}
		<dc:creator>{$udalost.vlozil|escape}</dc:creator>
    <pubDate>{$udalost.insert_rss2}</pubDate>
		<guid>https://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id|escape}.html</guid>
  </item>
	{/if}
{/foreach}
   </channel>
</rss>
