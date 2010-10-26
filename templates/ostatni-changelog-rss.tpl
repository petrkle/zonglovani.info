<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://{$smarty.server.SERVER_NAME}/changelog.html">
    <title>Změny v žonglérově slabikáři</title>
    <link>http://{$smarty.server.SERVER_NAME}/changelog.html</link>
    <description>Seznam změn v žonglérově slabikáři</description>
    <items>
 <rdf:Seq>
{foreach from=$zmeny item=zmena name=smycka1}
{if $smarty.foreach.smycka1.index < 10}
  <rdf:li resource="http://{$smarty.server.SERVER_NAME}/changelog.html#{$zmena.cislo}" />
{/if}
{/foreach}
 </rdf:Seq>
</items>
</channel>
{foreach from=$zmeny item=zmena name=smycka2}
{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="http://{$smarty.server.SERVER_NAME}/changelog.html#{$zmena.cislo}">
    <title>{$zmena.popis|truncate:30:'':false}</title>
    <link>http://{$smarty.server.SERVER_NAME}/changelog.html#{$zmena.cislo}</link>
    <description>{$zmena.popis}</description>
    <dc:creator>petr</dc:creator>
    <dc:date>{$zmena.time_mr}</dc:date>
  </item>
{/if}
{/foreach}

</rdf:RDF>
