{literal}<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="https://{/literal}{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<language>cs</language>
<title>Žonglování - tip týdne</title>
<atom:link href="https://{$smarty.server.SERVER_NAME}/tip/tip.xml" rel="self" type="application/rss+xml" />
<link>https://{$smarty.server.SERVER_NAME}/tip/</link>
<description>Tip týdne z žonglérova slabikáře.</description>
<copyright>pek - {$smarty.server.SERVER_NAME}</copyright>
<image>
<url>https://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
<title>Žonglování - tip týdne</title>
<link>https://{$smarty.server.SERVER_NAME}/tip/</link>
</image>

{section loop=$tipy name=smycka2 step=-1}
{if $smarty.section.smycka2.index < 10}
<item>
<title>{$tipy[$smarty.section.smycka2.index].nadpis|escape}</title>
<link>https://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}</link>
<dc:creator>pek</dc:creator>
<description>
<![CDATA[
<p>
<div style="float:left;margin:0 5px;">
{obrazek soubor=$tipy[$smarty.section.smycka2.index].obrazek popisek=$tipy[$smarty.section.smycka2.index].nadpis|escape absolute=yes} 
</div>
<br clear="both" />
{$tipy[$smarty.section.smycka2.index].text|escape}
</p>
]]>
</description>
<pubDate>{$tipy[$smarty.section.smycka2.index].cas_imgrss}</pubDate>
<guid>https://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}</guid>
</item>
{/if}
{/section}
</channel></rss> 
