<?xml version="1.0" encoding="utf-8"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://purl.org/rss/1.0/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:taxo="http://purl.org/rss/1.0/modules/taxonomy/">
  <channel rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}">
    <title>Diskuse o žonglování</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}</link>
    <description>Diskuse o žonglování</description>
    <items>
      <rdf:Seq>
				{foreach from=$zpravy item=zprava name=smycka1}
				{if $smarty.foreach.smycka1.index < 10}
        <rdf:li resource="http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$page_numbers.total}.html#{$zprava.cas}" />
				{/if}
				{/foreach}
      </rdf:Seq>
    </items>
  </channel>
{foreach from=$zpravy item=zprava name=smycka2}
	{if $smarty.foreach.smycka2.index < 10}
  <item rdf:about="http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$page_numbers.total}.html#{$zprava.cas}">
    <title>{$zprava.text|truncate:30:"...":true|escape}</title>
    <link>http://{$smarty.server.SERVER_NAME}{$smarty.const.DISKUSE_URL}stranka{$page_numbers.total}.html#{$zprava.cas}</link>
    <description>{$zprava.text|wordwrap:50:"\n":true|escape}</description>
    <dc:creator>{$zprava.autor|escape}</dc:creator>
    <dc:date>{$zprava.cas_mr|escape}</dc:date>
  </item>
	{/if}
{/foreach}

</rdf:RDF>
