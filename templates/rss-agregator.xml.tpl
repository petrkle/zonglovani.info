{literal}<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet href="https://{/literal}{$smarty.server.SERVER_NAME}/xml.xsl" type="text/xsl"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<title>Žonglování</title>
	<link>https://{$smarty.server.SERVER_NAME}/rss/</link>
	<description>Novinky ze světa žonglování</description>
	<language>cs</language>
	<image>
	<url>https://{$smarty.server.SERVER_NAME}/img/s/slabikar1.gif</url>
	<link>https://{$smarty.server.SERVER_NAME}/novinky/agregator.xml</link>
	<title>Žonglování</title>
	</image> 
	<atom:link href="https://{$smarty.server.SERVER_NAME}/novinky/agregator.xml" rel="self" type="application/rss+xml" />
{foreach from=$novinky item=udalost name=smycka2}
<item>
	<title>{$udalost.titulek|escape|default:'Bez titulku'}</title>
	<link>{$udalost.url|escape}</link>
	<description>{$udalost.description|strip_tags|escape}</description>
	<author>admin@{$smarty.server.SERVER_NAME}</author>
	<pubDate>{$udalost.time_mr}</pubDate>
	<guid>{$udalost.url|escape}</guid>
</item>
{/foreach}
</channel>
</rss>
