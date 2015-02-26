<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="https://{$smarty.server.SERVER_NAME}/tip/">
    <title>Žonglování - tip týdne</title>
    <link>https://{$smarty.server.SERVER_NAME}/tip/</link>
    <description>Tip týdne z žonglérova slabikáře.</description>
    <items>
      <rdf:Seq>
				{section loop=$tipy name=smycka1 step=-1}
				{if $smarty.section.smycka1.index < 10}
        <rdf:li resource="https://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka1.index].link}" />
				{/if}
				{/section}
      </rdf:Seq>
    </items>
  </channel>
{section loop=$tipy name=smycka2 step=-1}
	{if $smarty.section.smycka2.index < 10}
  <item rdf:about="https://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}">
    <title>{$tipy[$smarty.section.smycka2.index].nadpis|escape}</title>
    <link>https://{$smarty.server.SERVER_NAME}{$tipy[$smarty.section.smycka2.index].link}</link>
    <description>{$tipy[$smarty.section.smycka2.index].text|escape}</description>
    <dc:creator>pek</dc:creator>
    <dc:date>{$tipy[$smarty.section.smycka2.index].cas_mr}</dc:date>
  </item>
	{/if}
{/section}
</rdf:RDF>
