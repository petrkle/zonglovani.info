<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
<channel rdf:about="https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}">
<title>Diskuse o žonglování</title>
<link>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}</link>
<description>Diskuse o žonglování</description>
<items>
<rdf:Seq>
{section loop=$zpravy name=smycka1 step=-1}
{if $smarty.section.smycka1.rownum < 10}
<rdf:li resource="https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$zpravy[$smarty.section.smycka1.index].stranka}.html#{$zpravy[$smarty.section.smycka1.index].cas}" />
{/if}
{/section}
</rdf:Seq>
</items>
</channel>
{section loop=$zpravy name=smycka2 step=-1}
{if $smarty.section.smycka2.rownum < 10}
<item rdf:about="https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$zpravy[$smarty.section.smycka2.index].stranka}.html#{$zpravy[$smarty.section.smycka2.index].cas}">
<title>{$zpravy[$smarty.section.smycka2.index].text|strip_tags:false|truncate:30:"...":false|escape}</title>
<link>https://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$zpravy[$smarty.section.smycka2.index].stranka}.html#{$zpravy[$smarty.section.smycka2.index].cas}</link>
<description>{$zpravy[$smarty.section.smycka2.index].text|escape}</description>
<dc:creator>{$zpravy[$smarty.section.smycka2.index].autor|escape}</dc:creator>
<dc:date>{$zpravy[$smarty.section.smycka2.index].cas_mr}</dc:date>
</item>
{/if}
{/section}
</rdf:RDF>
