<?xml version="1.0" encoding="iso-8859-2"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://www.abclinuxu.cz/software">
    <title>Kalend�� �ongl�rsk�ch akc�</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}</link>
    <description>Kalend�� �ongl�rsk�ch akc�</description>
    <items>
      <rdf:Seq>
				{foreach from=$events item=udalost name=smycka1}
				{if $smarty.foreach.smycka1.index < 10}
        <rdf:li resource="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html" />
				{/if}
				{/foreach}
      </rdf:Seq>
    </items>
  </channel>
{foreach from=$events item=udalost name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html">
    <title>{$udalost.title}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.CALENDAR_URL}udalost-{$udalost.id}.html</link>
    <description>{$udalost.desc}</description>
    <dc:creator>{$udalost.vlozil}</dc:creator>
    <dc:date>{$udalost.insert_mr}</dc:date>
  </item>
	{/if}
{/foreach}

</rdf:RDF>
