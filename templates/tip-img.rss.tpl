<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>Žonglování - tip týdne</title>
<atom:link href="http://{$smarty.server.SERVER_NAME}/tip/tip-img.rss" rel="self" type="application/rss+xml" />
<link>http://{$smarty.server.SERVER_NAME}/tip/</link>
<description>Tip týdne z žonglérova slabikáře.</description>
<copyright>pek - {$smarty.server.SERVER_NAME}</copyright>
<image>
<url>http://{$smarty.server.SERVER_NAME}/img/s/slabikar-fb.png</url>
<title>Žonglování - tip týdne</title>
<link>http://{$smarty.server.SERVER_NAME}/tip/</link>
</image>

{section loop=$tipy name=smycka2 step=-1}
{if $smarty.section.smycka2.index < 10}
<item>
<title>{$tipy[$smarty.section.smycka2.index].nadpis|escape}</title>
<link>http://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}</link>
<dc:creator>pek</dc:creator>
<description>
<![CDATA[
<p>
<div style="float:left;margin:0 5px;">
{obrazek soubor=$tipy[$smarty.section.smycka2.index].obrazek popisek=$tipy[$smarty.section.smycka2.index].nadpis|escape absolute=yes} 
</div>
{$tipy[$smarty.section.smycka2.index].text|escape}
</p>
]]>
</description>
<pubDate>{$tipy[$smarty.section.smycka2.index].cas_imgrss}</pubDate>
<guid>http://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}</guid>
</item>
{/if}
{/section}
</channel></rss> 
