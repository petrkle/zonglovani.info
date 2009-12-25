<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}">
    <title>Obrázky žonglování</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}</link>
    <description>Obrázky žonglování, žonglérů a žonglérek</description>
    <items>
      <rdf:Seq>
				{section loop=$obrazky name=smycka1 step=-1}
				{if $smarty.section.smycka1.index < 10}
        <rdf:li resource="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazky[$smarty.section.smycka1.index].name}/" />
				{/if}
				{/section}
      </rdf:Seq>
    </items>
  </channel>
{section loop=$obrazky name=smycka2 step=-1}
	{if $smarty.section.smycka2.index < 10}
  <item rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazky[$smarty.section.smycka2.index].name}/">
    <title>{$obrazky[$smarty.section.smycka2.index].title|escape}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazky[$smarty.section.smycka2.index].name}/</link>
    <description>{$obrazky[$smarty.section.smycka2.index].title|escape}</description>
    <dc:creator>{$obrazky[$smarty.section.smycka2.index].autor|escape}</dc:creator>
    <dc:date>{$obrazky[$smarty.section.smycka2.index].datum_mr|escape}</dc:date>
  </item>
	{/if}
{/section}
</rdf:RDF>
