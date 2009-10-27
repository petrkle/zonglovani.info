<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://{$smarty.server.SERVER_NAME}">
    <title>Žonglérův slabikář</title>
    <link>http://{$smarty.server.SERVER_NAME}</link>
    <description>Žonglérův slabikář</description>
    <items>
      <rdf:Seq>
				{foreach from=$udalosti item=udalost name=smycka1}
				{if $smarty.foreach.smycka1.index < 10}
        <rdf:li resource="{$udalost.link}" />
				{/if}
				{/foreach}
      </rdf:Seq>
    </items>
  </channel>
{foreach from=$udalosti item=udalost name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="http://{$udalost.link}/">
    <title>{$udalost.title|escape}</title>
    <link>{$udalost.link}</link>
    <description>{$udalost.description|escape}</description>
    <dc:creator>{$udalost.creator|escape}</dc:creator>
    <dc:date>{$udalost.dc.date|escape}</dc:date>
  </item>
	{/if}
{/foreach}

</rdf:RDF>
