{include file="mail/html-hlavicka.tpl"}
<p>
Vzkaz od: <a href="mailto:{$from|escape}?subject=Žonglování">{$from|escape}</mailto>
</p>

<pre>
{$vzkaz|escape}
</pre>

<p>
Tento vzkaz byl zaslán pomocí žonglérova slabikáře.<br/>
<a href="https://zonglovani.info/">https://zonglovani.info/</a>
</p>
{include file="mail/html-paticka.tpl"}
