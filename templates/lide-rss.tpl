<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}">
    <title>Seznam žonglérů</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}</link>
    <description>Seznam uživatelů žonglérova slabikáře</description>
    <items>
      <rdf:Seq>
				{foreach from=$uzivatele item=uzivatel name=smycka1}
				{if $smarty.foreach.smycka1.index < 10}
        <rdf:li resource="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$uzivatel.login}.html" />
				{/if}
				{/foreach}
      </rdf:Seq>
    </items>
  </channel>
{foreach from=$uzivatele item=uzivatel name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$uzivatel.login}.html">
    <title>{$uzivatel.jmeno|escape}</title>
    <link>https://{$smarty.server.SERVER_NAME}{$smarty.const.LIDE_URL}{$uzivatel.login}.html</link>
    <description>{$uzivatel.jmeno|escape} - nový uživatel žonglérova slabikáře.</description>
    <dc:creator>{$uzivatel.login}</dc:creator>
    <dc:date>{$uzivatel.registrace_mr}</dc:date>
  </item>
	{/if}
{/foreach}

</rdf:RDF>
