<?xml version="1.0" encoding="iso-8859-2"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}">
    <title>Obrázky žonglování</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}</link>
    <description>Obrázky žonglování, žonglérů a žonglérek</description>
    <items>
      <rdf:Seq>
				{foreach from=$obrazky item=obrazek name=smycka1}
				{if $smarty.foreach.smycka1.index < 10}
        <rdf:li resource="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazek.name}/" />
				{/if}
				{/foreach}
      </rdf:Seq>
    </items>
  </channel>
{foreach from=$obrazky item=obrazek name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazek.name}/">
    <title>{$obrazek.title|escape}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.OBRAZKY_URL}{$obrazek.name}/</link>
    <description>{$obrazek.title|escape}</description>
    <dc:creator>{$obrazek.autor|escape}</dc:creator>
    <dc:date>{$obrazek.datum_mr|escape}</dc:date>
  </item>
	{/if}
{/foreach}

</rdf:RDF>
