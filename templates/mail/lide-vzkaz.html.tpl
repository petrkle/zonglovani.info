{include file="mail/html-hlavicka.tpl"}
Autor vzkazu: <a href="mailto:{$from}">{$from}</a>

<pre>
{$vzkaz|escape}
</pre>

<p>
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.<br/>
<a href="http://zonglovani.info/">http://zonglovani.info/</a>
</p>
{include file="mail/html-paticka.tpl"}
